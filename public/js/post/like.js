'use strict';

/* Getting post's like counter  & 'like' button  */
const likePost = document.getElementById('likePost'),
      postLikesCount = document.getElementById('postLikesCount');

likePost.addEventListener('click', evt => {

    /* Server URL ( Controller's action ) to adding like on the post */
    let url = likePost.dataset.route;

    /* Sending a request to add like on the post */
    fetch(url)
        .then(resp => resp.text())
        .then(likes => {
            postLikesCount.textContent = likes; /* <- Update the like's counter */
        });

})
