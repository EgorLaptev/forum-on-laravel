'use strict';

let commentForm = document.getElementById('commentForm');

commentForm.addEventListener('submit', evt => {

    evt.preventDefault();

    /* getting content from form */
    let formData = new FormData(commentForm);

    /* Server URL ( Controller's action ) for adding a new comment */
    let url = commentForm.getAttribute('action');

    /* Sending a request to add a new comment */
    fetch(url, {
        method: 'post',
        body: formData
    })
        .then(resp => resp.text())
        .then(commentText => {

            /* Getting comments list */
            let commentsList = document.getElementById('commentsList');

            /* Creating new comment block */
            let comment = document.createElement('li');
            comment.className = 'container comment bg-dark text-light text-left p-4 pb-5 rounded mb-3';
            comment.innerHTML = commentText;

            /* Adding new comment block to the comments list */
            commentsList.appendChild(comment);

        });

});
