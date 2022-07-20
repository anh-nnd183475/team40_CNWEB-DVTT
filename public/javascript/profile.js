function show_all(){
    items = document.getElementsByClassName('detail');
    for(let i = 0; i < items.length; i++){
        items[i].style.display = 'flex';
    }
    rs = document.getElementsByClassName('result');
    for(let i = 0; i < rs.length; i++){
        rs[i].style.display = 'none';
    }
}

function show_by_status(stt){
    items = document.getElementsByClassName(stt);
    details = document.getElementsByClassName('detail');
    for(let i = 0; i < details.length; i++){
        details[i].style.display = 'none';
    }
    
    for(let i = 0; i < items.length; i++){    
        items[i].style.display = 'flex';
    }
    
    rs = document.getElementsByClassName('result');
    for(let i = 0; i < rs.length; i++){
        rs[i].style.display = 'none';
    }
    if(stt === 'stt0' || stt === 'stt1'){
        for(let i = 0; i < rs.length; i++){
            rs[i].style.display = 'flex';
        }
    }
    if(stt === 'stt0'){
        stt1 = document.getElementsByClassName('stt1');
        for(let i = 0; i < stt1.length; i++){
            stt1[i].style.display = 'none';
        }
    } else if(stt === 'stt1'){
        stt0 = document.getElementsByClassName('stt0');
        for(let i = 0; i < stt0.length; i++){
            stt0[i].style.display = 'none';
        }
    }
    
}

