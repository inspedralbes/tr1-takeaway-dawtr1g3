export async function getProductes() {
    let response = await fetch("https://www.omdbapi.com/?s=cars&apikey=8c3be63e");
    let productes = await response.json();
    console.log(productes);
    return productes.Search;
}