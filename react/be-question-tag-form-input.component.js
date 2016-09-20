var QuestionTagFormInput = React.createClass ({
    getInitialState: function () {
        return {
            input: true
        }
    },
    
    setTagSelect: function (event) {
        if(event.target.value != 'n') {
            this.state.input = false;
            this.setState({input: this.state.input});
            this.props.setTagInput(event.target.value);
        }
        else {
            this.state.input = true;
            this.setState({input: this.state.input});
        }
    },
    
    resetInput: function () {
        this.refs.userTag.value = "";
    },
    
    setTagInput: function (event) {
        this.props.setTagInput(event.target.value);
    },
    
    render: function () {
        return (
            <span>
            <input type='text' className='form-control' id='tag_input_text' ref='userTag' name='q_tag' disabled={!this.state.input}
            autoComplete='off' onChange={this.setTagInput}/>
            <select id='tag_select' className='form-control' name='pd_tag' ref='pdTag' onChange={this.setTagSelect}>
                <option value='n'>[None]</option>
                <option value='1'>Ach1</option>
                <option value='2'>Ach2</option>
                <option value='3'>Ach3</option>
                <option value='4'>Ach4</option>
                <option value='5'>Ach5</option>
                <option value='6'>Ach6</option>
                <option value='7'>Ach7</option>
                <option value='Improv'>Improv</option>
            </select>
            </span>
        );
    }
});

window.QuestionTagFormInput = QuestionTagFormInput;