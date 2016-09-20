var QuestionTagForm = React.createClass ({
    tag: "",
    
    setTagInput: function (newTag) {
        this.tag = newTag;
    },
    
    tagFormSubmit: function (event) {
        event.preventDefault();
        this.props.disableTagForm();
        console.log(this.tag);
        $.ajax({
            url: 'react/setTag.php',
            type: "POST",
            dataType: "json",
            data: {
                "tag": this.tag,
                "q_id": this.props.id
            },
            success: function (data) {
                this.props.refresh();
                console.log(data);
            }.bind(this)
        });
    },
    
    render: function () {
        return (
            <form type="POST" onSubmit={this.tagFormSubmit}>
                <QuestionTagFormInput
                setTagInput={this.setTagInput}
                />
                <input type='submit' className='btn btn-md btn-danger' value='Add tag' name='addTag'/>
            </form>
        );
    }
});

window.QuestionTagForm = QuestionTagForm;