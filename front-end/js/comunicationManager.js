export async function getProductes() {
    let response = await fetch("http://localhost:8000/api/productes");
    let productes = await response.json();
    console.log(productes);
    return productes;
}

export async function getCategories() {
    let response = await fetch("http://localhost:8000/api/categories");
    let categories = await response.json();
    console.log(categories);
    return categories;
}