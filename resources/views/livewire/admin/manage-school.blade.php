<div x-data="{tab:'campus',title(){
    let pageTitle = document.querySelector('#title');
    pageTitle.innerHTML = '| '+ this.tab.toUpperCase();
}}"
    x-init="title()">
    <div>
        <div>
            @include('admin-pages.components.campus.campus-list')
        </div>
        <div>

        </div>
    </div>
</div>
