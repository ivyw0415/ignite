var ProjectorListItem = React.createClass ({
    tagging: false,
    
    getInitialState: function () {
        return {
            actor: false
        }
    },
    
    pushActorQuestion: function () {
        $.ajax({
            url: 'react/pushActorQuestion.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "q_id" : this.props.id
            },
            success: function (data) {
                this.setState({actor: true});
            }.bind(this)
        });
    },
    
    finishQuestion: function () {
        $.ajax({
            url: 'react/finishQuestion.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "q_id": this.props.id
            },
            success: function (data) {
                this.props.refresh();
            }.bind(this)
        });
    },
    
    enableTagForm: function () {
        this.tagging = true;
        this.props.refresh();
    },
    
    disableTagForm: function () {
        this.tagging = false;
        this.props.refresh();
    },
    
    render: function () {
        return (
            <tr>
            <td className='content-td ctrl-td-text'>
            <span onClick={this.enableTagForm}>{this.props.content} - #{this.props.tag}</span>
            {this.tagging ?
                <QuestionTagForm
                key={this.props.id}
                id={this.props.id}
                content={this.props.content}
                disableTagForm={this.disableTagForm}
                refresh={this.props.refresh}
                /> : null}
            </td>
            <td>
            {this.props.vote}
            </td>
            <td>
            {(!this.props.actor) ?
            <input className='btn btn-sm btn-danger btn-block' type='button' onClick={this.pushActorQuestion} value='A'/>
            :
            <div className='btn btn-sm btn-block'>A</div>
            }
            
            </td>
            <td>
            <input className='btn btn-sm btn-danger btn-block' type='button' onClick={this.finishQuestion} value='X'/>
            </td>
            </tr>
        );
    }
});

var ProjectorList = React.createClass ({
    getInitialState: function () {
        return {
            questions: []
        };
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'react/getProjectorQues.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.setState({questions: data});
                setTimeout(this._startRefreshing, 1000);
            }.bind(this)
        });
    },
    
    getProjectorQuestions: function () {
        $.ajax({
            url: 'react/getProjectorQues.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.setState({questions: data});
            }.bind(this)
        });
    },
    
    render: function () {
        var questions = []
        if(this.state.questions && this.state.questions.length > 0) {
            questions = this.state.questions.map(function (q) {
                return (
                    <ProjectorListItem
                    key={q.id}
                    id={q.id}
                    content={q.content}
                    tag={q.tag}
                    vote={q.vote}
                    actor={q.kind == 7 ? true : false}
                    refresh={this.getProjectorQuestions}
                    />
                );
            }.bind(this))
        }
        return (
            <table className='table table-hover ctrl-table'>
            <tbody>
            {questions}
            </tbody>
            </table>
        );
    }
});

window.ProjectorList = ProjectorList;