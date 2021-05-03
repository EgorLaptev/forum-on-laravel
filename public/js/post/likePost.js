'use strict';

const likePost = document.getElementById('likePost'),
      postLikesCount = document.getElementById('postLikesCount');

likePost.addEventListener('click', evt => {

    let url = likePost.dataset.route;

    fetch(url)
        .then(resp => resp.text())
        .then(likes => {
            postLikesCount.textContent = likes;
        });

})
