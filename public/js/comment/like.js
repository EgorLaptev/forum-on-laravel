'use strict';

/* All 'like' button in the comments */
const likeComments = document.querySelectorAll('.likeComment');

for (const likeComment of likeComments) {

    /* Adding a listener to each 'like' button in the comments */
    likeComment.addEventListener('click', evt => {

        /* Server URL ( Controller's action ) for adding like on the comment */
        let url = likeComment.dataset.route;

        /* Getting the likes counter in a comment */
        let commentLikesCount = likeComment.querySelector('.likesCount');

        /* Sending a request to add a like to a comment */
        fetch(url)
            .then(resp => resp.text())
            .then(likes => {
                commentLikesCount.textContent = likes; /* <- Update the like's counter */
            });

    })

}

