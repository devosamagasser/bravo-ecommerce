<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/bootstrap.min.js"></script>
<script src=<?=assets("website/assets/js/tiny-slider.js")?>></script>
<script src=<?=assets("website/assets/js/glightbox.min.js")?>></script>
<script src=<?=assets("website/assets/js/main.js")?>></script>
<script src=<?=assets("website/assets/js/bootstrap.min.js")?>></script>
<script src=<?= assets("admin1/plugins/jquery/jquery.min.js") ?>></script>
<script>
    searchinput = document.getElementById('search');
    searchresults = document.getElementById('search-resutls');
    searchselection = document.getElementById('search-select');
    categorie = 0;
    keyword = "";
    
    searchselection.addEventListener('change',()=>{
        categorie = searchselection.value
        searchresults.style.display = "none";
        if(keyword){
            searchresults.style.display = "block";
            $.post(`/ajaxController/search/${keyword}/${categorie}`,{
            },function(data){
                console.log(data)
                searchresults.innerHTML = data
            })
        }
    })

    searchinput.addEventListener('input',()=>{
        keyword = searchinput.value
        searchresults.style.display = "none";
        if(keyword){
            searchresults.style.display = "block";
            $.post(`/ajaxController/search/${keyword}/${categorie}`,{
            },function(data){
                console.log(data)

                searchresults.innerHTML = data
            })
        }
    })
</script>

