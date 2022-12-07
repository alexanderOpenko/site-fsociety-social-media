project = {}

function init () {
    project.avatar.init()
}

project.avatar = {
    profile_image_input: '',

    init: function () {
        this.avatar()
    },

    avatar: function () {
        const profile_image = document.querySelector('.profile_image')
        this.profile_image_input = profile_image.querySelector('input')
        
        this.profile_image_input.addEventListener('change', this.avatarChangeHandler.bind(this))
        profile_image.addEventListener('click', this.avatarInputDispatch.bind(this))
    },

    avatarInputDispatch: function () {
        this.profile_image_input.click()
    },

    avatarChangeHandler: function () {
        const form = document.querySelector('.user_avatar_form')
        const formData = new FormData(form)
        formData.append('action', 'set_avatar')
        const url = 'profile_avatar'

        fetch(url, {
            method: 'POST',
            body: formData
        }).then((response) => {
            window.location.reload()
          })
    }
}

window.addEventListener('load', () => init())