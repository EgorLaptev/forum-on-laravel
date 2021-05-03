'use strict';

const deleteComments = document.querySelectorAll('.deleteComment');

for (const deleteComment of deleteComments) {

    deleteComment.addEventListener('click', evt => {

        let url = deleteComment.dataset.route;


        fetch(url)
            .then(resp => resp.text())
            .then(text => {
                if(text == '') deleteComment.parentElement.remove();
            });

    })

}

