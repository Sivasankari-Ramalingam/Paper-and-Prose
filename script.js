
async function fetchBooks() {
    fetch('get_books.php')
        .then(response => response.json()) 
        .then(data => {
            const bookList = document.getElementById('book-list');
            bookList.innerHTML = ''; 
            
            
            data.forEach(book => {
                const bookElement = document.createElement('div');
                bookElement.classList.add('book');

                bookElement.innerHTML = `
                    <img src="${book.book_image}" alt="${book.title}" class="book-image">
                    <div class="book-details">
                        <h2>${book.title}</h2>
                        <p><strong>Author:</strong> ${book.author_first_name} ${book.author_last_name}</p>
                        <p><strong>Nationality:</strong> ${book.author_nationality}</p>
                        <p><strong>Price:</strong> $${book.price}</p>
                        <p><strong>Publish Date:</strong> ${new Date(book.publish_date).toLocaleDateString()}</p>
                        <p><button type="button" class="btn btn-info" onclick='addToCart(${JSON.stringify(book)})'>Add to Cart</button></p>  
                    </div>
                `;
                    
                bookList.appendChild(bookElement);
            });
        })
        .catch(error => console.error('Error fetching books:', error));
}


function addToCart(item) {

    
    let cart = JSON.parse(localStorage.getItem("book_cart")) || [];
    // let cartCount = localStorage.getItem("book_cartCount") || 0;
    // cartCount = parseInt(cartCount) + 1;
    const existingItem = cart.find(cartItem => cartItem.title === item.title);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        item.quantity = 1;
        cart.push(item);
    }
    localStorage.setItem("book_cart", JSON.stringify(cart));

    // Recalculate total quantity
    const totalItems = cart.reduce((acc, book) => acc + book.quantity, 0);
    localStorage.setItem("book_cartCount", totalItems);

    if(typeof updateCartCount === "function"){
        updateCartCount(totalItems);
    }
    
    alert("Added to cart!");
}

document.addEventListener('DOMContentLoaded', () =>{
    
    if (!window.isLoggedIn) {
        alert("Please log in to add items to your cart.");
        window.location.href = 'login.php'; // or show a login modal
        return;
      }

    fetchBooks()

    if(typeof updateCartCount === "function"){
        updateCartCount(totalItems);
    }

});
