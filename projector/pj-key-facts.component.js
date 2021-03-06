var KeyFactListItem = React.createClass ({
    // scrollFacts: function(count){
    //     var i=2;
    //     for(i=2;i<count-1;i++){
    //         var remove_id = '#' + (count-i-1);
    //         $(remove_id).remove();
    //     }
        
    //     $('.gogogo').addClass('removed');           
    // },
    // deleteClass: function(){
    //     $('.gogogo').removeClass('removed');
    // },
    
    render: function () {
        //if(this.props.status == 1 && this.props.f_id > 2)
        //     this.scrollFacts(this.props.f_id);
        return (this.props.status == 0 ?
        <div className="col-md-3 locked-fact">
            <div className="lock">
              <span className="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </div>
        </div>
        
        :
        <div className="col-md-3 unlocked-fact highlighted">
            <div className="fact" id="">
                {this.props.content}
                <div className="align-bot">
                    <hr />
                    <div className="unlocked-by">
                        Unlocked by: <span className="user">{this.props.u_name}</span>
                    </div>
                    <em>
                        {this.props.q_content}
                    </em>
                </div>
            </div>
            <div className="lock">
              <span className="glyphicon glyphicon-lock" aria-hidden="true"></span>
            </div>
        </div>
        );
       // this.deleteClass();
    }
    //this.deleteClass();
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
                    f_id = {f.id}
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