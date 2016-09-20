var QuestionsToAskListItem = React.createClass ({
    
    render: function () {
        var classNames = (this.props.kind == 7 ? 'asking' : '');
        return (this.props.kind == 7 ? 
        <div>
            <div className='p-ques-user p-change asking'>
                {this.props.name}
            </div>
            <div className='p-ques p-change asking'>
                <div className='p-content'>
                    {this.props.content}  
                </div>
                <div className='p-vote'>
                    {this.props.vote}
                </div>
            </div>
        </div>
        :
        <div>
            <div className='p-ques-user'>
                {this.props.name}
            </div>
            <div className='p-ques'>
                <div className='p-content'>
                    {this.props.content}  
                </div>
                <div className='p-vote'>
                    {this.props.vote}
                </div>
            </div>
        </div>
        );
    }
});

var QuestionsToAskList = React.createClass ({
    getInitialState: function () {
        return {
            questions: []
        };
    },
    
    componentWillMount: function () {
        this.getQuestionsToAsk();
    },
    
    getQuestionsToAsk: function () {
        $.ajax({
            url: 'getQuestionsToAsk.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.setState({questions: data});
                setTimeout(this.getQuestionsToAsk, 1000);
            }.bind(this)
        });
    },
    
    render: function () {
        var questions = [];
        if(this.state.questions && this.state.questions.length > 0) {
            questions = this.state.questions.map(function (q) {
                return (
                    <QuestionsToAskListItem
                    key={q.id}
                    content={q.content}
                    vote={q.vote}
                    kind={q.kind}
                    name={q.user_name}
                    />
                );
            })
        }
        return (
            <div>
            {questions}
            </div>
        );
    }
});

ReactDOM.render(
    <QuestionsToAskList/>,
    document.getElementById('allQues')
);