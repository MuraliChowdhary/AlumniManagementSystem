// script.js

document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = document.getElementById('name').value;
    const year = document.getElementById('year').value;
    const rating = document.getElementById('rating').value;
    const comments = document.getElementById('comments').value;
    
    const feedback = {
      name: name,
      year: year,
      rating: rating,
      comments: comments
    };
    
    // For simplicity, we'll log the feedback to the console.
    // In a real application, this data would be sent to a server.
    console.log('Feedback submitted:', feedback);
  
    // Display a thank you message
    document.getElementById('responseMessage').textContent = 'Thank you for your feedback!';
    
    // Clear the form
    document.getElementById('feedbackForm').reset();
  });
  