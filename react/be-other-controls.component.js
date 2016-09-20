var StartGameButton = React.createClass ({
    ready: false,
    
    getInitialState: function () {
        return {
            started: false
        }
    },
    
    getStartGame: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 3
            },
            success: function (data) {
                this.ready = true;
                this.state.started = data.status==1;
                this.setState({started: this.state.started});
                console.log("start status: " +this.state.started);
            }.bind(this)
        })
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 3
            },
            success: function (data) {
                this.ready = true;
                this.state.started = data.status==1;
                this.setState({started: this.state.started});
                setTimeout(this._startRefreshing, 1000);
            }.bind(this)
        })
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    toggleStartGame: function () {
        if(this.ready) {
            $.ajax({
                url: 'react/setStatus.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    "status_id": 3,
                    "value": this.state.started?0:1
                },
                success: function () {
                    this.state.started = !this.state.started;
                    this.setState({started: this.state.started});
                    console.log("Game "+(this.state.started?'started!':'stopped!'));
                }.bind(this)
            });
        }
    },
    
    render: function () {
        var classNames = 'btn btn-lg btn-block'+(this.state.started ? ' btn-danger'
        : '');
        return (
            <input type='button'
            className={classNames}
            value={this.state.started?'CLOSE':'OPEN'}
            onClick={this.toggleStartGame}/>
        );
    }
});

var PopupButton = React.createClass ({
    getInitialState: function () {
        return {
            shown: false
        }
    },
    
    getPopup: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 2
            },
            success: function (data) {
                this.ready = true;
                this.state.shown = data.status==1;
                this.setState({shown: this.state.shown});
                console.log("popup status: " +this.state.shown);
            }.bind(this)
        })
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 2
            },
            success: function (data) {
                this.ready = true;
                this.state.shown = data.status==1;
                this.setState({shown: this.state.shown});
                setTimeout(this._startRefreshing, 1000);
            }.bind(this)
        })
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    togglePopup: function () {
        $.ajax({
            url: 'react/setStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 2,
                "value": this.state.shown?0:1
            },
            success: function (data) {
                this.state.shown = !this.state.shown;
                this.setState({shown: this.state.shown});
                console.log("Popup status "+this.state.shown?'on!':'off!');
            }.bind(this)
        })
    },
    
    render: function () {
        var classNames = 'btn btn-lg btn-block'+(this.state.shown ? ' btn-danger'
        : '');
        return (
            <input type='button'
            className={classNames}
            value={this.state.shown?'DISMISS':'SHOW'}
            onClick={this.togglePopup}/>
        );
    }
});

var CutSceneButton = React.createClass ({
    getInitialState: function () {
        return {
            shown: false
        }
    },
    
    getCutScene: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 6
            },
            success: function (data) {
                this.ready = true;
                this.state.shown = data.status==1;
                this.setState({shown: this.state.shown});
                console.log("cutscene status: " +this.state.shown);
            }.bind(this)
        })
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 6
            },
            success: function (data) {
                this.ready = true;
                this.state.shown = data.status==1;
                this.setState({shown: this.state.shown});
                setTimeout(this._startRefreshing, 1000);
            }.bind(this)
        })
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    toggleCutScene: function () {
        $.ajax({
            url: 'react/setStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 6,
                "value": this.state.shown?0:1
            },
            success: function (data) {
                this.state.shown = !this.state.shown;
                this.setState({shown: this.state.shown});
                console.log("CutScene status "+this.state.shown?'on!':'off!');
            }.bind(this)
        })
    },
    
    render: function () {
        var classNames = 'btn btn-lg btn-block'+(this.state.shown ? ' btn-danger'
        : '');
        return (
            <input type='button'
            className={classNames}
            value={this.state.shown?'DISMISS':'SHOW'}
            onClick={this.toggleCutScene}/>
        );
    }
});

var TimerButton = React.createClass ({
    getInitialState: function () {
        return {
            started: false,
            paused: false
        }
    },
    
    getTime: function () {
        $.ajax({
            url: 'projector/getTime.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.started = (data.time != null);
                this.setState({started: this.state.started});
            }.bind(this)
        })
    },
    
    getPauseStatus: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 4
            },
            success: function (data) {
                this.state.paused = (data.status == 1);
                this.setState({paused: this.state.paused});
            }.bind(this)
        });
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'projector/getTime.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                this.state.started = (data.time != null);
                this.setState({started: this.state.started});
                
                $.ajax({
                    url: 'react/getStatus.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "status_id": 4
                    },
                    success: function (data) {
                        this.state.paused = (data.status == 1);
                        this.setState({paused: this.state.paused});
                        
                        setTimeout(this._startRefreshing, 1000);
                        
                    }.bind(this)
                });
                
            }.bind(this)
        })
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    toggleStartTimer: function () {
        if(!this.state.started) {
            var startTime = Date.now();
            console.log(startTime.toString());
            $.ajax({
                url: 'projector/setTime.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    "time": startTime.toString()
                },
                success: function (data) {
                    this.state.started = true;
                    this.setState({started: this.state.started});
                    console.log("Timer Started! "+data);
                }.bind(this)
            });
            $.ajax({
                url: 'react/setStatus.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    "status_id": 4,
                    "value": 0
                },
                success: function (data) {
                    this.state.paused = false;
                    this.setState({paused: this.state.paused});
                    console.log("Pause reset! "+data);
                }.bind(this)
            });
        }
        else {
            $.ajax({
                url: 'projector/delTime.php',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    this.state.started = false;
                    this.setState({started: this.state.started});
                    console.log("Timer Stopped! "+data);
                }.bind(this)
            });
            $.ajax({
                url: 'react/setStatus.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    "status_id": 4,
                    "value": 0
                },
                success: function (data) {
                    this.state.paused = false;
                    this.setState({paused: this.state.paused});
                    console.log("Pause reset! "+data);
                }.bind(this)
            });
        }
    },
    
    togglePauseTimer: function () {
        $.ajax({
            url: 'react/setStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 4,
                "value": this.state.paused?0:1
            },
            success: function (data) {
                this.state.paused = !this.state.paused;
                this.setState({paused: this.state.paused});
                console.log("Timer "+this.state.paused?'paused!':'resumed!');
            }.bind(this)
        })
    },
    
    render: function () {
        var startClass = 'btn btn-lg btn-block'+(this.state.started ? ' btn-danger'
        : '');
        var pauseClass = 'btn btn-lg btn-block'+(this.state.paused ? ' btn-danger'
        : '');
        return (
            <div>
            <input type='button'
            className={startClass}
            value={!this.state.started?'START':'STOP'}
            onClick={this.toggleStartTimer}/>
            {this.state.started ?
            <input type='button'
            className={pauseClass}
            value={!this.state.paused?'PAUSE':'RESUME'}
            onClick={this.togglePauseTimer}/>
            : null}
            </div>
        );
    }
});

var GameEndButton = React.createClass ({
    getInitialState: function () {
        return {
            shown: false
        }
    },
    
    getGameEnd: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 5
            },
            success: function (data) {
                this.ready = true;
                this.state.shown = data.status==1;
                this.setState({shown: this.state.shown});
                console.log("gameend status: " +this.state.shown);
            }.bind(this)
        })
    },
    
    _startRefreshing: function () {
        $.ajax({
            url: 'react/getStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 5
            },
            success: function (data) {
                this.ready = true;
                this.state.shown = data.status==1;
                this.setState({shown: this.state.shown});
                setTimeout(this._startRefreshing, 1000);
            }.bind(this)
        })
    },
    
    componentWillMount: function () {
        this._startRefreshing();
    },
    
    toggleGameEnd: function () {
        $.ajax({
            url: 'react/setStatus.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "status_id": 5,
                "value": this.state.shown?0:1
            },
            success: function (data) {
                this.state.shown = !this.state.shown;
                this.setState({shown: this.state.shown});
                console.log(("gameend status ")+(this.state.shown?'on!':'off!'));
            }.bind(this)
        })
    },
    
    render: function () {
        var classNames = 'btn btn-lg btn-block'+(this.state.shown ? ' btn-danger'
        : '');
        return (
            <input type='button'
            className={classNames}
            value={this.state.shown?'DISMISS':'SHOW'}
            onClick={this.toggleGameEnd}/>
        );
    }
});

var OtherControl = React.createClass ({
    render: function () {
        return (
            <table className='other-ctrl'>
            <tbody>
            <tr>
                <td>Entrance:</td>
                <td>
                <StartGameButton />
                </td>
            </tr>
            <tr>
                <td>Timer:</td>
                <td>
                <TimerButton />
                </td>
            </tr>
            <tr>
                <td>CutScene:</td>
                <td>
                <CutSceneButton />
                </td>
            </tr>
            <tr>
                <td>Popup:</td>
                <td>
                <PopupButton />
                </td>
            </tr>
            <tr>
                <td>User Result:</td>
                <td>
                <GameEndButton />
                </td>
            </tr>
            </tbody>
            </table>
        );
    }
});

window.OtherControl = OtherControl;