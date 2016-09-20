var QuestionsListItem = React.createClass({
    render: function() {
        return (
            <tr>
                <td>{this.props.content}</td>
                <td>{this.props.vote}</td>
            </tr>
        )
    }
});

var QuestionsList = React.createClass({
    
    render: function () {
        var questionItems = this.props.data.map(function(q) {
            return (
                <QuestionsListItem
                key={q.id}
                content={q.content}
                vote={q.vote} />
            );
        })
        return (
            <table>
            <tbody>
            {questionItems}
            </tbody>
            </table>
        );
    }
});

var QuestionsBlock = React.createClass({
    getInitialState: function() {
        return {
            data: []
        };
    },
    
    componentDidMount: function () {
        this.getAllQuestions();
        setInterval(this.getAllQuestions, 2000);
    },
    
    getAllQuestions: function() {
        var that = this;
        $.ajax({
            url: '/GMYGWebApp/testbe/getAllQues.php',
            datatyep: 'json',
            success: function (data) {
                //console.log(data);
                this.setState({data: data});
            }.bind(this)
        });
    },
    
    render: function () {
        return <QuestionsList data={this.state.data}/>
    }
});

ReactDOM.render(
    <QuestionsBlock />,
    document.getElementById('content')
);