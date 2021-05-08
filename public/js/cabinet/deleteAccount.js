'use strict';

const deleteAccount = document.querySelector('#deleteAccount');

let deleteConfirm = false;

deleteAccount.addEventListener('click', evt => {

    /* Prevent deletion without confirmation */
    if(!deleteConfirm) evt.preventDefault();
    else return true;

    /* Confirm deleting */
    deleteConfirm = true;

    /* Make the button non-clickable for 2s */
    deleteAccount.textContent = 'This is irreversible';
    deleteAccount.classList.add('disabled');

    setTimeout(() => {

        /* Make the button clickable */
        deleteAccount.classList.remove('disabled');

        /* Return start status of delete button after 5s */
        setTimeout( () => {
                deleteConfirm = false;
                deleteAccount.textContent = 'Delete account';
        }, 5000);

    }, 2000);

    return true;

});
