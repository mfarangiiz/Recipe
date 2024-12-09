document.addEventListener("DOMContentLoaded", function () {
    const adminDropdown = document.getElementById("adminDropdown");
    const dropdownMenu = document.getElementById("dropdownMenu");

    // Admin dropdown menyusini ko'rsatish va yashirish
    adminDropdown.addEventListener("click", function (event) {
        event.preventDefault();
        dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
    });

    // Dropdown menyu tashqarisiga bosilganda, menyuni yopish
    document.addEventListener("click", function (event) {
        if (!adminDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggles = document.querySelectorAll(".dropdown-sidebar-toggle");

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener("click", function (event) {
            event.preventDefault();
            const dropdownMenu = this.nextElementSibling;
            dropdownMenu.classList.toggle("active");
        });
    });
});





document.addEventListener("DOMContentLoaded", function () {
    const notificationBadge = document.getElementById("notificationBadge");
    const notificationIcon = document.querySelector(".notification-icon");

    // Retsept yuborilganida bildirishnoma ko'rsatish
    function showNotification(count) {
        notificationBadge.style.display = "flex"; // Badjni ko'rsatish
        notificationBadge.textContent = count; // Badjda ko'rsatiladigan son
    }

    // Masalan, yangi retsept yuborilganida
    let notificationCount = 0;
    document.addEventListener("recipeSubmitted", function () {
        notificationCount++;
        showNotification(notificationCount);
    });

    // Bildirishnoma bosilganda tozalash
    notificationIcon.addEventListener("click", function () {
        notificationCount = 0;
        notificationBadge.style.display = "none"; // Badjni yashirish
    });
});





// Retseptni ko'rsatish uchun modalni ochish
function viewRecipe(recipeId) {
    document.getElementById('recipeModal').style.display = 'flex';
    // Retsept tafsilotlarini ko'rsatish
    document.getElementById('recipeDetails').innerHTML = `
        <p>Tayyorlash usuli: Osh tayyorlash usulini shu yerda ko'rsatish mumkin...</p>
    `;
}

// Modalni yopish
function closeModal() {
    document.getElementById('recipeModal').style.display = 'none';
}

// Retseptni tasdiqlash
function approveRecipe() {
    alert('Retsept tasdiqlandi!');
    // Retseptni tasdiqlashni amalga oshirish (API chaqiruvi yoki ma'lumotlar bazasiga yozish)
    closeModal();
}

// Retseptni rad etish
function rejectRecipe() {
    alert('Retsept rad etildi!');
    // Retseptni rad etishni amalga oshirish (API chaqiruvi yoki ma'lumotlar bazasidan o'chirish)
    closeModal();
}





// Modalni ochish funksiyasi
function openEditModal(id, name, ingredients, instructions, image) {
    // Modalni ko'rsatish
    document.getElementById('editModal').style.display = 'block';
    
    // Formani to'ldirish
    document.getElementById('recipeId').value = id;
    document.getElementById('editRecipeName').value = name;
    document.getElementById('editIngredients').value = ingredients;
    document.getElementById('editInstructions').value = instructions;
    // Rasmni ko'rsatish uchun, agar rasm yuklanmagan bo'lsa, oldingi rasmni ko'rsatish mumkin
    // Agar tasvir mavjud bo'lsa, qo'shimcha o'zgartirishlar qilish mumkin
    if (image) {
        document.getElementById('editRecipeImage').value = image;
    }
}

// Modalni yopish funksiyasi
function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

// Retseptni o'chirish funksiyasi (AJAX orqali)
function deleteRecipe(id) {
    if (confirm('Haqiqatan ham ushbu retseptni o\'chirmoqchimisiz?')) {
        fetch('/recipes/delete/' + id, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Retsept o\'chirildi');
                location.reload(); // Jadvalni yangilash
            } else {
                alert('Xatolik yuz berdi');
            }
        })
        .catch(error => {
            alert('Xatolik yuz berdi');
        });
    }
}





