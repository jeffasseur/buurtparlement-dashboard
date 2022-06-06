if(document.querySelector('aside')) {
    const menu = document.querySelector('#menu-btn');
    const close = document.querySelector('#btnClose');
    const aside = document.querySelector('aside');
    
    menu.addEventListener('click', (e) => {
        aside.style.display = 'block';
        document.querySelector('.ownContainer').style.transparency = '0.2';
    });
    
    close.addEventListener('click', (e) => {
        aside.style.display = 'none';
    });
}