tinymce.init({
    selector:'textarea#post_content', 
    height: 300,
    plugins: [
        "advlist autolink link lists charmap preview hr pagebreak",
        "wordcount visualblocks visualchars insertdatetime nonbreaking",
        "contextmenu paste textcolor"
    ],
    toolbar: "undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright justify | hr | link"
});