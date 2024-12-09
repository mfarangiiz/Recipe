//Kategoriyalar 
document.querySelectorAll('.open-modal').forEach(button => {
    button.addEventListener('click', function() {
        const modalId = this.getAttribute('data-target');
        document.getElementById(modalId).style.display = 'flex';
    });
});


document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', function(event) {
       
        if (event.target === this) {
            this.style.display = 'none';
        }
    });
});


//Login

const openLoginBtn = document.querySelector('.modal-trigger'); // Kirish tugmasini tanlash
const closeLoginBtn = document.getElementById('closeLogin'); // Modalni yopish uchun tugma
const loginModal = document.getElementById('loginModal'); // Modal oynasi


openLoginBtn.addEventListener('click', (event) => {
    event.preventDefault(); // Sahifani qayta yuklashni oldini olish
    loginModal.style.display = 'flex'; // Modalni ko'rsatish
});


closeLoginBtn.addEventListener('click', () => {
    loginModal.style.display = 'none'; // Modalni yopish
});


window.addEventListener('click', (e) => {
    if (e.target === loginModal) {
        loginModal.style.display = 'none'; // Modalni tashqarisiga bosilganda uni yopish
    }
});






// Retsept qo'shish
// Formani yuborishni tutish
document.getElementById('recipe-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Formani yuborishni to'xtatish

    // Formadan ma'lumotlarni olish
    const recipeName = document.getElementById('recipe-name').value;
    const recipeIngredients = document.getElementById('recipe-ingredients').value;
    const recipeInstructions = document.getElementById('recipe-instructions').value;
    const recipeImage = document.getElementById('recipe-image').files[0];
    const category = document.getElementById('category').value; // Kategoriya tanlash

    // Kategoriyaga mos containerni olish
    const categoryContainer = document.getElementById(category + '-recipes');  // Kategoriyaga mos containerni olish

    if (categoryContainer) {
        const recipeCard = document.createElement('div');
        recipeCard.classList.add('recipe-card');

        // Agar rasm bo'lsa, uni ko'rsatish
        const imageUrl = recipeImage ? URL.createObjectURL(recipeImage) : '';

        recipeCard.innerHTML = `
            <img src="${imageUrl}" alt="${recipeName}" class="recipe-image">
            <h4>${recipeName}</h4>
            <p><strong>Masalliqlar:</strong> ${recipeIngredients}</p>
            <p><strong>Tayyorlanish:</strong> ${recipeInstructions}</p>
        `;

        categoryContainer.appendChild(recipeCard);
    }

    // Xabar chiqarish
    document.getElementById('success-message').style.display = 'block';

    // Formani tozalash
    document.getElementById('recipe-form').reset();
});




// Xabarni avtomatik yashirish
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000); // 5 soniya
});

