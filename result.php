<?php
require('fpdf/fpdf.php');

class Invoice extends FPDF {
    function Header() {
        // Set font and color for the header text
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(255);
        
        // Set background color for the header
        $this->SetFillColor(0);
        
        // Fill the entire page with black
        $this->Rect(0, 0, $this->GetPageWidth(), $this->GetPageHeight(), 'F');
        
        // Add the logo in the top left corner
        $this->Image('Logo2.jpeg', 10, 10, 30);
        
        // Add the company name and address
        $this->SetTextColor(255);
        $this->Cell(0, 10, 'Balaji Creations', 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'www.balajicreations.com', 0, 1, 'C');
        
        // Add a line break
        $this->Ln(10);
    }
    
    function Footer() {
        // Set font and color for the footer text
        $this->SetTextColor(255);
        
        // Set background color for the footer
        $this->SetFillColor(0);
        
        // Fill the entire footer area with black
        $this->Rect(0, $this->GetPageHeight() - 15, $this->GetPageWidth(), 15, 'F');
        
        // Add the page number
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
    function AddCustomerDetails($details) {
        // Set font and color for the subheader
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(255);

        // Add subheader
        $this->Cell(0, 10, 'Invoice To:', 0, 1, 'L');
        // Set font and color for the customer details
        $this->SetFont('Arial', '', 12);
        foreach ($details as $detail) {
        // Add customer details with indentation
            $this->SetX(20);
            $this->Cell(0, 10, 'Name: ' . $detail['name'], 0, 1, 'L');
            $this->SetX(20);
            $this->Cell(0, 10, 'Address: ' . $detail['address'], 0, 1, 'L');
            $this->SetX(20);
            $this->Cell(0, 10, 'Phone: ' . $detail['phone'], 0, 1, 'L');

            // Add a line break
            $this->Ln(10);
        }
    }

    
    
    function GenerateInvoice($items) {
        // Set font and color for the body text
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(255);
        
        // Set background color for the table headers
        $this->SetFillColor(0);
        
        // Set color for the table borders
        $this->SetDrawColor(255);
        
        // Add table headers
        $this->Cell(40, 10, 'Item', "B", 0, 'C', true);
        $this->Cell(30, 10, 'Quantity', "B", 0, 'C', true);
        $this->Cell(60, 10, 'Notes', "B", 0, 'C', true);
        $this->Cell(30, 10, 'Discount', "B", 0, 'C', true);
        $this->Cell(30, 10, 'Price', "B", 1, 'C', true);
        
        // Add table rows
        foreach ($items as $item) {
            $this->Cell(40, 10, $item['name'], "B", 0, 'C');
            $this->Cell(30, 10, $item['quantity'], "B", 0, 'C');
            $this->Cell(60, 10, $item['notes'], "B", 0, 'C');
            $this->Cell(30, 10, $item['discount'], "B", 0, 'C');
            $this->Cell(30, 10, $item['price'], "B", 1, 'C');
        }
    }
}

// Create a new PDF instance
$pdf = new Invoice();

// Add a new page
$pdf->AddPage();

// Define the customer details
// Define the customer details as JSON
$customerDetailsJson = '{
    "name": "John Doe",
    "address": "123 Easy Street, New York, NY 10003",
    "phone": "(123) 456-7890"
}';
// var_dump($customerDetailsJson);
$customerDetailsJson = $_GET['customer'];
$customerDetails = json_decode($customerDetailsJson, true);

// Convert the JSON to an array of associative arrays
$itemsJson= $_GET['json'];
$items = json_decode($itemsJson, true);

// Add the customer details
$pdf->AddCustomerDetails($customerDetails);

// Generate the invoice
$pdf->GenerateInvoice($items);

// Output the PDF
$pdf->Output();
?>
