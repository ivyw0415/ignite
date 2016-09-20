var MyQuestionListItem = React.createClass ({
    
    render: function () {
        var iconClass = "fa fa-2x";
        if(this.props.kind == 1) {
            iconClass += " fa-mobile";
        }
        else if(this.props.kind == 4) {
            iconClass += " fa-desktop";
        }
        return (
            <tr>
            <td className='hist-icon'>
            <span className={iconClass}></span>
            </td>
            <td>
            {this.props.content}
            </td>
            <td className='hist-vote'>
            {this.props.vote}
            </td>
            </tr>
        );
    }
});

var MyQuestionList = React.createClass ({
    getInitialState: function () {
        return {
            ques: []
        }
    },
    
    componentWillMount: function () {
        this.getMyQuestions();
    },
    
    getMyQuestions: function () {
        $.ajax({
            url: '../react/getUserQues.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                this.setState({ques:data});
            }.bind(this)
        })
    },
    
    render: function () {
        var ques = [];
        if(this.state.ques && this.state.ques.length > 0) {
            ques = this.state.ques.map(((q) => {
                return (
                    <MyQuestionListItem
                    key={q.id}
                    id = {q.id}
                    content = {q.content}
                    vote = {q.vote}
                    kind = {q.kind}
                    />
                );
            }).bind(this))
        }
        return (
            <table className='table'>
            <thead>
            <tr>
            <th className='hist-head' colSpan="3">
            My Questions
            </th>
            </tr>
            </thead>
            <tbody id="history">
            {ques}
            </tbody>
            </table>
        );
    }
});

ReactDOM.render(
    <MyQuestionList />,
    document.getElementById('myQues')
);