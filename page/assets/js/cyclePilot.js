// Arquebus pilots data for cycling (must match PHP $pilots order)
        let current = 0;
        function cycleAC(dir) {
            current = (current + dir + pilots.length) % pilots.length;
            document.getElementById('acImgTag').src = pilots[current].img;
            document.getElementById('acImgTag').alt = pilots[current].ac + " Image";
            document.getElementById('pilotName').textContent = pilots[current].name;
            document.getElementById('acName').textContent = pilots[current].ac;
            document.getElementById('acDesc').textContent = pilots[current].desc;
        }