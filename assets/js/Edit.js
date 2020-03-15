
//Permet d'afficher une pop-up editer avec la technologie ajax
export default class Edit{

    constructor(element){
        if(element==null){
            return null
        }
        this.content = document.querySelector('.js-content')
        this.bindEvents()
    }
    bindEvents(){
        let links = document.querySelectorAll('.edit' )
        links.forEach(link=>{
            link.addEventListener('click',e=>{
                e.preventDefault()
                this.loadUrl(e.currentTarget.getAttribute('href'))
            })
        })
    }
    async loadUrl(url){
        const response = await fetch(url,{
            headers:{
                'X-Requested-with':'XMLHttpRequest'
            }
        })
        if(response.status>=200 && response.status < 300){
            const data = await response.json()
            this.content.innerHTML = data.content
            this.submit(url)
            this.close()
        }
    }
     
    close(){
        document.querySelector('.button').addEventListener('click',()=>{
            this.content.innerHTML = ""
        })
    }
    submit(url){
        const form = this.content.querySelector('.js-form')
        const data = new FormData(form)
        data.forEach((value,key)=>{
            console.log(key)
        })
        form.addEventListener('submit', (e) => {
            console.log(url)
            
            fetch(url, { method: form.method, body: new FormData(form) })
              .then(response => response.json())
              .then(json => console.log(json));
            
            return false;
    })
}
}