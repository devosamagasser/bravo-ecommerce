// checkbox color and size form
checkcolor = document.getElementById("project-colors")
projectboxsize = document.getElementById("project-sizes")
colorsizeform = document.getElementById("add-project-form")
if(checkcolor && projectboxsize && colorsizeform){
    checkcolor.addEventListener("change",()=>{
        if(checkcolor.checked){
            if(projectboxsize.checked){
                colorsizeform.action = "/admin/Products/add/colorsize"
            }else{
                colorsizeform.action = "/admin/Products/add/color"
            }
        }
    })
    projectboxsize.addEventListener("change",()=>{
        if(projectboxsize.checked){
            if(checkcolor.checked){
                console.log("osama")
                colorsizeform.action = "/admin/Products/add/colorsize"
            }
        }
    })
}

// //////////
// display sections of categorie when select a category and brands of section when select a section
var categoriess = document.getElementById("categoriesselect"); 
var sections = document.getElementById("sectionsselect"); 
var brands = document.getElementById("brandsselect"); 
console.log("osama")
if(categoriess && sections && brands){

    categoriess.addEventListener('change',() => {
        var cat = categoriess.value
        $.post("/admin/AjaxController/getSctionsOfCategory/"+cat,{ 
        },function(data){
            sections.innerHTML = data
        })
    })

    categoriess.addEventListener('change',() => {
        var cat = categoriess.value
        $.post("/admin/AjaxController/getBrandsOfCategory/"+cat,{ 
        },function(data){
            brands.innerHTML = data
        })
    })
sections.addEventListener('change',() => {
    var sec = sections.value
    $.post("/admin/AjaxController/getBrandsOfSection/"+sec,{ 
    },function(data){
        brands.innerHTML = data
    })
})
}
// ///////////

// display and hide quantity input by size check box  
sizebox = document.getElementsByClassName('sizebox')
quanbox = document.getElementsByClassName('size-quan')

function checksize(sizebox, quanbox) {
    sizebox.addEventListener("change", () => {
        let order = sizebox.getAttribute("order")
        if (sizebox.checked) {
            console.log(sizebox.value);
            quanbox.setAttribute("name","quan"+order+"[]"); 
            quanbox.style.display = 'block'; 

        } else {
            quanbox.removeAttribute("name"); 
            quanbox.style.display = 'none';
        }
    });
}

for (var i = 0; i < sizebox.length; i++) { 
    checksize(sizebox[i], quanbox[i]);
}
//////////

// delete color and size body 
deletecolorsizebtn = document.getElementsByClassName("delete-color-size")
colorsizebody = document.getElementsByClassName("color-size-body")
function deletecsbody(deletecolorsizebtn, colorsizebody) {
    deletecolorsizebtn.addEventListener("click", () => {
        colorsizebody.remove()
        sizebox = document.getElementsByClassName('sizebox')
        quanbox = document.getElementsByClassName('size-quan')
        for (var i = 0; i < sizebox.length; i++) { 
            checksize(sizebox[i], quanbox[i]);
        }
    })
}
for (var i = 0; i < deletecolorsizebtn.length; i++) { 
    deletecsbody(deletecolorsizebtn[i], colorsizebody[i]);
}
// /////////

// add color size body by click on add color and size button
addcolorsize  = document.getElementById("add-color-size")

if(addcolorsize){
    console.log(addcolorsize)
    addcolorsize.addEventListener("click",()=>{
        let order = (deletecolorsizebtn.length > 0) ? deletecolorsizebtn[deletecolorsizebtn.length - 1].getAttribute("order") : 1
        console.log(order)
        $.post("/admin/AjaxController/getColorAndSize/"+order,{
        },function(data){
            // console.log(data)
            $("#color-and-size-container").append(data)
            sizebox = document.getElementsByClassName('sizebox')
            quanbox = document.getElementsByClassName('size-quan')
            for (var i = 0; i < sizebox.length; i++) { 
                checksize(sizebox[i], quanbox[i]);
            }
            deletecolorsizebtn = document.getElementsByClassName("delete-color-size")
            colorsizebody = document.getElementsByClassName("color-size-body")
            for (var i = 0; i < deletecolorsizebtn.length; i++) { 
                deletecsbody(deletecolorsizebtn[i], colorsizebody[i]);
            }
        })
    })
}
// ///////////////

// delete color body 
deletecolorbtn = document.getElementsByClassName("delete-color")
colorbody = document.getElementsByClassName("color-body")
function deletecbody(deletecolorbtn, colorbody) {
    deletecolorbtn.addEventListener("click", () => {
        colorbody.remove()
    })
}
for (var i = 0; i < deletecolorbtn.length; i++) { 
    deletecbody(deletecolorbtn[i],colorbody[i]);
}
// ////////////////////

// add color size body by click on add color and size button
addcolor  = document.getElementById("add-color")

if(addcolor){
    addcolor.addEventListener("click",()=>{
        let order = (deletecolorbtn.length > 0 ) ? deletecolorbtn[deletecolorbtn.length - 1].getAttribute("order") : 1
        $.post("/admin/AjaxController/getColor/"+order,{
        },function(data){
            $("#color-container").append(data)
            deletecolorbtn = document.getElementsByClassName("delete-color")
            colorbody = document.getElementsByClassName("color-body")
            for (var i = 0; i < deletecolorbtn.length; i++) { 
                deletecbody(deletecolorbtn[i],colorbody[i]);
            }
        })
    })
}
// ///////////////

deletefeaturebtn = document.getElementsByClassName("delete-feature")
featurebody = document.getElementsByClassName("feature-body")

function deletefbody(deletefeaturebtn, featurebody) {
    deletefeaturebtn.addEventListener("click", () => {
        featurebody.remove()
    })
}
for (var i = 0; i < deletefeaturebtn.length; i++) { 
    deletefbody(deletefeaturebtn[i],featurebody[i]);
}

addfeature  = document.getElementById("add-feature")

if(addfeature){
    addfeature.addEventListener("click",()=>{
        let order = (deletefeaturebtn.length > 0 )?deletefeaturebtn[deletefeaturebtn.length - 1].getAttribute("order") : 1
        $.post("/admin/AjaxController/getFeatures/"+order,{
        },function(data){
            $("#feature-container").append(data)
            deletefeaturebtn = document.getElementsByClassName("delete-feature")
            featurebody = document.getElementsByClassName("feature-body")
            for (var i = 0; i < deletefeaturebtn.length; i++) { 
                deletefbody(deletefeaturebtn[i],featurebody[i]);
            }
        })
    })
}