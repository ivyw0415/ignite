var KeyFactListItem = React.createClass ({
    render: function () {
        return (this.props.status == 0 ?
        <div className='p-achv locked'>
        <div className='locked-logo fa fa-lock fa-3x'></div>
        </div>
        :
        <div>
        <div className='p-achv-user unlock highlighted'>
            From: {this.props.u_name}
        </div>
        <div className='p-achv unlock highlighted'>
        <div className='unlock-content'>
            <div className="p-achv-q">
                {this.props.q_content}
            </div>
            <div className="p-achv-content">
                {this.props.content}
            </div>
        </div>
        </div>
        </div>
        );
    }
});

var KeyFactList = React.createClass ({
    getInitialState: function () {
        return {
            facts: []
        }
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    getAllFacts: function () {
        $.ajax({
            url: 'getAllFacts.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.setState({facts:data});
            }.bind(this)
        })
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'getAllFacts.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.setState({facts:data});
                //console.log(this.props.q_content);
                setTimeout(this._startRefreshing, 1000);
            }.bind(this)
        })
    },
    
    render: function () {
        var facts = [];
        if(this.state.facts && this.state.facts.length > 0) {
            facts = this.state.facts.map(((f) => {
                return (
                    <KeyFactListItem
                    key={f.id}
                    content={f.content}
                    status={f.status}
                    q_id = {f.q_id}
                    q_content = {f.q_content}
                    u_name = {f.user_name}
                    />
                );
            }).bind(this))
        }
        return (
            <div>
            {facts}
            </div>
        );
    }
});

ReactDOM.render(
    <KeyFactList />,
    document.getElementById('facts-content')
);