var QuestionsToAskListItem = React.createClass ({
    
    render: function () {
        var classNames = (this.props.kind == 7 ? 'asking' : '');
        return (this.props.kind == 7 ? 
        <div className='question'>
            <div className="row asking">
                <div className="col-sm-10 question-content">
                    {this.props.content}
                </div>
                <div className="col-sm-2 text-center">
                    <div className="vote-num">{this.props.vote}</div>
                    <div className="author">
                        <p>Asked by:<br /><span className="user">{this.props.name}</span></p>
                    </div>
                </div>
            </div>
            
        </div>
        :
        <div className='question'>
            <div className="row">
                <div className="col-sm-10 question-content">
                    {this.props.content}
                </div>
                <div className="col-sm-2 text-center">
                    <div className="vote-num">{this.props.vote}</div>
                    <div className="author">
                        <p>Asked by:<br /><span className="user">{this.props.name}</span></p>
                    </div>
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