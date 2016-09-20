var QuestionListItem = React.createClass ({
    getInitialState: function () {
        return {
            tagFormEnabled: false,
        }
    },
    
    enableTagForm: function () {
        this.setState({tagFormEnabled: true});
    },
    
    disableTagForm: function () {
        this.setState({tagFormEnabled: false});
    },
    
    addVote: function () {
        console.log('vote');
        $.ajax({
            url: 'php/updateQvote_be.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "q_id": this.props.id,
                "q_vote": this.props.vote
            },
            success: function (data) {
                this.props.refresh();
                console.log("toggleVoted!!!: "+data);
            }.bind(this)
        });
    },
    
    moveToProjector: function () {
        console.log('move to projector');
        $.ajax({
            url: 'php/updateQpop.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "q_id": this.props.id
            },
            success: function (data) {
                this.props.refresh();
                console.log("moved!!!: "+data);
            }.bind(this)
        });
    },
    
    removeQuestion: function () {
        console.log('remove');
        $.ajax({
            url: 'php/updateQirr.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "q_id": this.props.id
            },
            success: function (data) {
                this.props.refresh();
                console.log("removed!!!: "+data)
            }.bind(this)
        });
    },
    
    render: function () {
        return (
            <tr>
            <td onClick={this.enableTagForm} className='ctrl-td-text'>
            {this.props.content} - #{this.props.tag}
            {this.state.tagFormEnabled ? 
                <QuestionTagForm
                key={this.props.id}
                id={this.props.id}
                content={this.props.content}
                disableTagForm={this.disableTagForm}
                refresh={this.props.refresh}/> : null}
            </td>
            <td>
            {this.props.vote}
            </td>
            <td className='vote-btn-td'>
            <input className='btn btn-sm btn-danger btn-block' type='button' value='R'
            onClick={this.removeQuestion} />
            </td>
            <td className='vote-btn-td'>
            <input className='btn btn-sm btn-danger btn-block' type='button' value='P'
            onClick={this.moveToProjector} />
            </td>
            <td className='vote-btn-td'>
            <input className='btn btn-sm btn-danger btn-block' type='button' value='V'
            onClick={this.addVote} />
            </td>
            </tr>
        );
    }
});

var QuestionList = React.createClass ({
    
    interval_id: 0,
    order: "q_vote",
            
    getInitialState: function () {
        return {
            questions: []
        }
    },
    
    componentDidMount: function () {
        this._startInterval();
    },
    
    _startInterval: function () {
        this.getAllQuestions();
        var id = setInterval(this.getAllQuestions, 2000);
        this.interval_id = id;
    },
    
    _stopInterval: function () {
        if(this.interval_id != 0) {
            clearInterval(this.interval_id);
            this.interval_id = 0;
        }
    },
    
    setOrder: function (event) {
        this.order = event.target.value;
        this.getAllQuestions();
    },
    
    getAllQuestions: function () {
        $.ajax({
            url: "react/getAllQues.php",
            type: 'POST',
            dataType: "json",
            data: {
                "order": this.order 
            },
            success: function (data) {
                this.setState({
                    questions: data
                });
            }.bind(this)
        });
    },
    
    render: function() {
        var questions = [];
        if(this.state.questions && this.state.questions.length > 0) {
            questions = this.state.questions.map(function (q) {
            return (
                <QuestionListItem
                key={q.id}
                id={q.id}
                content={q.content}
                tag={q.tag}
                vote={q.vote}
                refresh={this.getAllQuestions} />
            );
        }.bind(this));}
        return (
            <table className='table table-hover ctrl-table'>
            <thead>
            <tr><th>
            <select id='order_select' name='order' onChange={this.setOrder} defaultValue="q_vote">
                <option value='q_vote'>Vote</option>
                <option value='q_time'>Time</option>
            </select>
            </th></tr>
            </thead>
            <tbody>
            {questions}
            </tbody></table>
        );
    }
});

window.QuestionList = QuestionList;