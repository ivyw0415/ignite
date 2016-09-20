var AddQuestion = React.createClass({
    
    content: "",
    tag: "",
    kind: 1,
    
    addQuestion: function(event) {
        this.kind = (this.refs.toActor.checked?8:1);
        event.preventDefault();
        if(this.refs.questionInput.value == '') return;
        console.log("BE add question: "+this.content);
        $.ajax({
            url: 'react/addBEQuestion.php',
            type: 'POST',
            dataType: 'json',
            data: {
                "q_content": this.content,
                "q_tag": this.tag,
                "q_kind": this.kind
            },
            success: function (data) {
                this.content = "";
                this.tag = "";
                this.kind = 1;
                this.refs.questionInput.value = "";
                this.refs.questionInput.focus();
                this.refs.toActor.checked = false;
                if(this.refs.tagFormInput)
                    this.refs.tagFormInput.resetInput();
                console.log("add: "+data);
            }.bind(this)
        });
    },
    
    setContent: function (event) {
        this.content = event.target.value;
    },
    
    setTagInput: function (newTag) {
        this.tag = newTag;
        console.log("new tag: "+this.tag);
    },
    
    render: function () {
        return (
            <form method='post' onSubmit={this.addQuestion}>
                <input type='text' ref="questionInput" className='form-control' id='q_input' name='ques' placeholder='For the audience' autoComplete='off' onChange={this.setContent}/>
                <QuestionTagFormInput ref="tagFormInput"
                setTagInput={this.setTagInput}
                />
                <input type='checkbox' ref='toActor'/>Directly to Actor
                <input type='submit' className='btn btn-danger pull-rigt' name='addQ' value='Add Question' />
            </form>
        );
    }
});

window.AddQuestion = AddQuestion;