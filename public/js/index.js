window.addEventListener('DOMContentLoaded', (e) => {
    var oSelTestaments = document.getElementById('testaments');
    var oSelBooks = document.getElementsByName('books')[0];

    oSelTestaments.addEventListener('change', (e) => {
        setSelectionBooks(oSelTestaments.value);
    })

    oSelBooks.addEventListener('change', (e) => {
        setSelectionChapters();
    })

    setSelectionBooks(oSelTestaments.value);
});

function setSelectionBooks(testament)
{
    var req = new XMLHttpRequest();

    req.onreadystatechange = (e) => {
        if (req.readyState === XMLHttpRequest.DONE) {
            if (req.status === 200) {
                var dat = JSON.parse(req.responseText);
                var oSel = document.getElementsByName('books')[0];
                var oFrg = document.createDocumentFragment();
                var oOpt;

                // Empty Selection
                while(oSel.hasChildNodes())
                {
                    oSel.removeChild(oSel.lastChild);
                }

                for(var x in dat)
                {
                    oOpt = document.createElement('option');
                    oOpt.setAttribute('value', dat[x].no);
                    oOpt.dataset.chapterCnt = dat[x].chapter_cnt;
                    oOpt.innerText = dat[x].label;
                    oFrg.appendChild(oOpt);
                }

                oSel.appendChild(oFrg);

                setSelectionChapters()
            } else {
                // Error
            }
        }
    };

    req.open('GET', '/api/books?testament=' + encodeURIComponent(testament));
    req.send();
}

function setSelectionChapters() {
    var oBooks = document.getElementsByName('books')[0];
    var max = oBooks.options[oBooks.selectedIndex].dataset.chapterCnt;
    var oSel1 = document.getElementsByName('start_chapters')[0];
    var oSel2 = document.getElementsByName('end_chapters')[0];
    var oFrg = document.createDocumentFragment();
    var oOpt;

    // Empty Selection
    while(oSel1.hasChildNodes())
    {
        oSel1.removeChild(oSel1.lastChild);
    }

    while(oSel2.hasChildNodes())
    {
        oSel2.removeChild(oSel2.lastChild);
    }

    for(var i=1; i<=max; i++)
    {
        oOpt = document.createElement('option');
        oOpt.setAttribute('value', i);
        oOpt.innerText = i + '장';
        oFrg.appendChild(oOpt);
    }

    oSel1.appendChild(oFrg.cloneNode(true));
    oSel2.appendChild(oFrg);
}
