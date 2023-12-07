<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
   function generatePDF() {
   const element = document.getElementById('container_content');
   var opt = {
      margin:       1,
      filename:     'html2pdf_example.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    // Choose the element that our invoice is rendered in.
    html2pdf().set(opt).from(element).save();
   }
  </script>
  </head>