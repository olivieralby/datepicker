
export default class Show{

    constructor(element){
        if(element==null){
            return false
        }
        this.content = element.querySelector('.js-planning')
        this.bindEvents()
    }

    bindEvents(){
        const link = document.querySelector('.show_a')
        link.addEventListener('click',(e)=>{
           e.preventDefault()
           window.setTimeout(()=>{
               this.loadUrl(link.getAttribute('href'))

           },100)
        })
    }

    async loadUrl(url){
        const response = await fetch(url,{
            headers:{
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        if(response.status>=200 && response.status<300){
            const data = await response.json()
            this.content.innerHTML = data.content
        }
    }
}