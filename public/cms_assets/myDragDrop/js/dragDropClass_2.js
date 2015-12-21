//if (Modernizr.draganddrop) {
//  // Browser supports HTML5 DnD.
//  console.log(' Browser supports HTML5 DnD.');
//} else {
//    // Fallback to a library solution.
//  console.log(' Fallback to a library solution.');
//  
//}


/*________________________________public_variables*/

var dragElements = document.getElementsByClassName('dragable');
var dropElements = document.getElementsByClassName('dropable');
var reorderElements = document.getElementsByClassName('reorderable');
var dragedElement = null;
var reorderElement = null;
var dragIcon = document.createElement('img');
dragIcon.src = 'images/lara.jpg';
dragIcon.width = 10;

/*____________________________END____public_variables*/
/*_________functions*/
//1.dragstart

function handleDragStart(e) {
    // Target (this) element is the source node.
    //this.style.opacity = '0.4';

    e.dataTransfer.setDragImage(dragIcon, -1, -1);
    dragedElement = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
}


//2. dragenter, dragover, and dragleave
function handleDragOver(e) {
    if (e.preventDefault) {
        e.preventDefault(); // Necessary. Allows us to drop.
    }

    e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

    return false;
}

function handleDragEnter(e) {
    // this / e.target is the current hover target.
    this.classList.add('over');
}

function handleDragLeave(e) {
  //  this.classList.remove('over');  // this / e.target is previous target element.
}

//3. Completing a Drag
function handleDrop(e) {
    // this/e.target is current target element. 
    if (this.getAttribute('id') == 'trash_div') {
        delete_module(reorderElement);
        reorderElement = null;
        return false;
    }
    if (reorderElement != null) {


        this.appendChild(reorderElement);
        if (reorderElement.getAttribute('id') == "-2" && reorderElement.getAttribute('content_id') == "0")
            show_module_config_form($(reorderElement));
        save_modules_order($(this));
        reorderElement = null;
    }
    if (dragedElement == null)
        return false;


    if (e.stopPropagation) {
        e.stopPropagation(); // Stops some browsers from redirecting.
    }

    // Don't do anything if dropping the same column we're dragging.

    // Set the source column's HTML to the HTML of the column we dropped on.
    //dragSrcEl.innerHTML = this.innerHTML;

    // var hiddenDropableDiv=document.getElementById('hiddenDropableDiv');
    //hiddenDropableDiv.appendChild(dragedElement.cloneNode(true));
    //this.appendChild(hiddenDropableDiv);
    var newDragedElement = dragedElement.cloneNode(true);
    newDragedElement.classList.remove('dragable');
    newDragedElement.classList.add('reorderable');


    newDragedElement.addEventListener('dragstart', reorderHandleDragStart, false);

    //2. dragenter, dragover, and dragleave 
    newDragedElement.addEventListener('dragenter', reorderHandleDragEnter, false);
    newDragedElement.addEventListener('dragover', reorderHandleDragOver, false);
    newDragedElement.addEventListener('dragleave', reorderHandleDragLeave, false);

    //3. Completing a Drag
    newDragedElement.addEventListener('drop', reorderHandleDrop, false);
    newDragedElement.addEventListener('dragend', reorderHandleDragEnd, false);
    this.appendChild(newDragedElement);

    newDragedElement.setAttribute('onClick', 'show_module_config_form($(this));');
   // newDragedElement.setAttribute('onBlur', 'hide_module_config_form($(this));');
    $(newDragedElement).append('<b class="module_status_b red_font">not saved</b>');
    $(newDragedElement).click();
    $(newDragedElement).focus();
    //this.innerHTML= this.innerHTML+'<div class="dropable">'+e.dataTransfer.getData('text/html')+'</div>';




    for (var i = 0; i < dropElements.length; i++) {
        dropElements[i].classList.remove('over');
    }

    /*_______________________get_files*/
    var files = e.dataTransfer.files;
    for (var i = 0, f; f = files[i]; i++) {
        // Read the File objects in this FileList.
    }
    /*____________________END___get_files*/

    dragedElement = null;
    return false;
}

function handleDragEnd(e) {
    // this/e.target is the source node.

}
/*____________________________________reorder*/
function reorderHandleDragStart(e) {


    e.dataTransfer.setDragImage(dragIcon, -1, -1);

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
    reorderElement = this;
}
function reorderHandleDrop(e) {
    this.style.borderTop = '1px solid #999';

    if (reorderElement == null)
        return false;
    this.parentNode.insertBefore(reorderElement, this);

    save_modules_order($(this.parentNode));
    reorderElement = null;
}

function reorderHandleDragEnter(e) {
    this.style.borderTop = '20px solid rgba(0,0,255,0.3)';
}
function  reorderHandleDragOver(e) {
}
function   reorderHandleDragLeave(e) {
    this.style.borderTop = '1px solid #999';
}

function   reorderHandleDragEnd(e) {
    
    this.style.borderTop = '1px solid #999';
}


for (var i = 0; i < reorderElements.length; i++) {
    reorderElements[i].setAttribute('draggable', 'true');


    reorderElements[i].addEventListener('dragstart', reorderHandleDragStart, false);

    //2. dragenter, dragover, and dragleave 
    reorderElements[i].addEventListener('dragenter', reorderHandleDragEnter, false);
    reorderElements[i].addEventListener('dragover', reorderHandleDragOver, false);
    reorderElements[i].addEventListener('dragleave', reorderHandleDragLeave, false);

    //3. Completing a Drag
    reorderElements[i].addEventListener('drop', reorderHandleDrop, false);
    reorderElements[i].addEventListener('dragend', reorderHandleDragEnd, false);

}

/*__________________________________END__reorder*/
/*_______END__functions*/


for (var i = 0; i < dragElements.length; i++) {
    dragElements[i].setAttribute('draggable', 'true');

    //1.dragstart
    dragElements[i].addEventListener('dragstart', handleDragStart, false);


}


for (var i = 0; i < dropElements.length; i++) {



    //2. dragenter, dragover, and dragleave 
    dropElements[i].addEventListener('dragenter', handleDragEnter, false);
    dropElements[i].addEventListener('dragover', handleDragOver, false);
    dropElements[i].addEventListener('dragleave', handleDragLeave, false);

    //3. Completing a Drag
    dropElements[i].addEventListener('drop', handleDrop, false);
    dropElements[i].addEventListener('dragend', handleDragEnd, false);
}
