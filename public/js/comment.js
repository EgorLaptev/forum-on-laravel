'use strict';

let commentForm = document.getElementById('commentForm');

commentForm.addEventListener('submit', evt => {

    evt.preventDefault();

    let formData = new FormData(commentForm);

    let url = commentForm.getAttribute('action');

    fetch(url, {
        method: 'post',
        body: formData
    })
        .then(resp => resp.text())
        .then(commentText => {



            let commentsList = document.getElementById('commentsList');

            let comment = document.createElement('li');
            comment.className = 'container comment bg-dark text-light p-4 pb-5 rounded mb-3';

            comment.innerHTML = commentText;

            commentsList.appendChild(comment);

        });

});
