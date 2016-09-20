var AchievementListItem = React.createClass ({
    
    toggleStatus: function () {
        $.ajax({
            url: 'projector/changeFactStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "fact_id": this.props.id,
                "status": 1-this.props.status
            },
            success: function (data) {
                console.log("Ach "+this.props.id+" "+1-this.props.status);
                this.props.refresh();
            }.bind(this)
        })
    },
    
    render: function () {
        var shownClass = 'btn btn-sm btn-block'+(this.props.status==1?' btn-danger'
        :'');
        var buttonValue = (this.props.status==0 ? '+' : '-');
        return (
            <tr>
            <td className='on-screen-res ctrl-td-text'>
            {this.props.content}
            </td>
            <td className='vote-btn-td'>
            <input className={shownClass} type='button'
            value={buttonValue} onClick={this.toggleStatus}/>
            </td>
            </tr>
        );
    }
});

var AchievementList = React.createClass ({
    getInitialState: function () {
        return {
            ach: []
        }
    },
    
    getAllAchs: function () {
        $.ajax({
            url: 'projector/getAllFacts.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.ach = data;
                this.setState({ach: this.state.ach})
            }.bind(this)
        });
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'projector/getAllFacts.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.ach = data;
                this.setState({ach: this.state.ach})
                setTimeout(this._startRefreshing(), 1000);
            }.bind(this)
        });
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    render: function () {
        var ach = [];
        if(this.state.ach && this.state.ach.length > 0) {
            ach = this.state.ach.map (((a) => {
                return <AchievementListItem
                key={a.id}
                id={a.id}
                content={a.content}
                status={a.status}
                q_id={a.q_id}
                q_content={a.q_content}
                user={a.user_name}
                refresh={this.getAllAchs}
                />;
            }).bind(this))
        }
        return (
            <table className='table ctrl-table'>
            <tbody>
            {ach}
            </tbody>
            </table>
        );
    }
});

window.AchievementList = AchievementList;