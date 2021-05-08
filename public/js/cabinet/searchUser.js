'use strict';

/* Define search input & users list (table) */
const searchUser = document.querySelector('#searchUser'),
      usersList  = document.querySelector('#usersList');

let users = {},
    roles = {};

/* Getting users list */
fetch('http://forum/users/index')
    .then(resp => resp.json())
    .then(result => {
        users = result[0];
        roles = result[1];
        filterUser('');
    });

searchUser.addEventListener('input', evt => {

    filterUser(searchUser.value);

})

function filterUser(filterString) {

    /* Clear the table before displaying the search results */
    usersList.innerHTML = '';

    users.forEach((user, key) => {

        /* Filter users by... */
        if (
            user['id'].toString().match(filterString) || /* Filter by id */
            user['login'].match(filterString) || /* Filter by login */
            user['email'].match(filterString) || /* Filter by email */
            roles[user['role_id']]['name'].match(filterString) /* Filter by role */
        ) {

            let tr = document.createElement('tr');

            tr.innerHTML =
                `
                    <tr>
                        <td># ${user['id']}</td>
                        <td>${user['login']}</td>
                        <td>${user['email']}</td>
                        <td>${ roles[user['role_id']]['name'] }</td>
                        <td>
                            <a href="http://forum/user/cabinet/${user['id']}" class="userCabinet btn"><i class="fas fa-address-card text-secondary"></i></a>
                        </td>
                        <td>
                            <a href="http://forum/user/delete/${user['id']}" class="deleteUser btn"><i class="fas fa-trash text-secondary"></i></a>
                        </td>
                        <td>
                            <a href="http://forum/user/demote/${user['id']}" class="demoteUser btn"><i class="fas fa-chevron-down text-secondary"></i></a>
                        </td>
                        <td>
                            <a href="http://forum/user/empowerment/${user['id']}" class="empowermentUser btn"><i class="fas fa-chevron-up text-secondary"></i></a>
                        </td>
                    </tr>
                `;

            /* Adding a search result */
            usersList.appendChild(tr);

        }

    })

}
