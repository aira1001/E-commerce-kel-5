let totalJenisBarang = 1;
function TambahBarang() {
    totalJenisBarang++;
    let bodyBrg = document.getElementById("body-saksi").lastChild;
    let copyNode = bodyBrg.cloneNode(true);
    copyNode.id = `saksi-${totalJenisBarang}`;
    // copyNode.childNodes[1].innerText = totalJenisBarang;
    // copyNode.childNodes[3].childNodes[1].id = `nama-${totalJenisBarang}`;
    // copyNode.childNodes[5].childNodes[1].id = `umur-${totalJenisBarang}`;
    bodyBrg.appendChild(copyNode);
}
