document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('textarea').forEach((t) => t.value = '')
})

function open_reply(id) {
    document.getElementById('reply-' + id).classList.remove('is-hidden')
}

function close_reply(id) {
    document.getElementById('reply-' + id).classList.add('is-hidden')
}

function new_comment(id) {
    let textarea = document.getElementById('reply-area-' + id)
    fetch('/php/comment-post.php', {
        method: 'POST',
        body: JSON.stringify({
            "article_id": article_id,
            "root": id === 0 ? null : id,
            "body": textarea.value
        })
    }).then((r) => {
            if (r.status === 200) {
                overlay('Успешно добавлен комментарий',
                    () => document.location.reload())
            } else {
                overlay('Не удалось добавить комментарий',
                    (modal) => {
                        modal.classList.remove('is-active')
                        document.querySelectorAll('.reply').forEach((v) => v.classList.add('is-hidden'))
                    })
            }
        }
    )
}