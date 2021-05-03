'use strict';

const likeComments = document.querySelectorAll('.likeComment');

for (const likeComment of likeComments) {

    likeComment.addEventListener('click', evt => {

        let url = likeComment.dataset.route;

        let commentLiesCount = likeComment.querySelector('.likesCount');

        fetch(url)
            .then(resp => resp.text())
            .then(likes => {
                commentLiesCount.textContent = likes;
            });

    })

}

