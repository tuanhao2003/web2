(function(){
    document.addEventListener("DOMContentLoaded", ()=>{
        const wrapper = document.querySelector('.wrapper');
        const login = document.querySelector('.login-link');
        const register = document.querySelector('.register-link');
        const iconClose= document.querySelector('.icon-close');


        register.addEventListener('click', () => {
            wrapper.classList.add('active');
        })
        
        login.addEventListener('click', () => {
            wrapper.classList.remove('active');
        })

        iconClose.addEventListener('click', ()=>{
            // Remove active hoạt động
            wrapper.classList.remove();
        })
    })
})();
