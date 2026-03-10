package org.example;

import com.lowagie.text.*;
import com.lowagie.text.pdf.*;

import java.awt.BorderLayout;
import java.awt.FlowLayout;
import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.io.FileOutputStream;
import java.text.SimpleDateFormat;
import java.util.Date;

public class SystemRaportowania extends JFrame {

    private JTable table;
    private JComboBox<String> styleBox;

    public SystemRaportowania() {
        setTitle("System Raportowania");
        setSize(400, 400);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLocationRelativeTo(null);
        DefaultTableModel model = new DefaultTableModel();
        model.addColumn("ID");
        model.addColumn("Nazwa Produktu");
        model.addColumn("Ilość");
        model.addColumn("Cena");
        model.addRow(new Object[]{1, "Sukienki", 60, 700});
        model.addRow(new Object[]{2, "Spodniczka", 125, 1280});
        model.addRow(new Object[]{3, "Koszulki", 8, 150});
        model.addRow(new Object[]{4, "Spodnie", 15, 1550});
        table = new JTable(model);
        JButton button = new JButton("Generuj Raport PDF");
        button.addActionListener(e -> exportToPDF());
        styleBox = new JComboBox<>(new String[]{"Metal", "Nimbus", "CDE/Motif"});
        styleBox.addActionListener(e -> changeStyle());
        JPanel topPanel = new JPanel(new FlowLayout());
        topPanel.add(new JLabel("Styl aplikacji: "));
        topPanel.add(styleBox);
        add(topPanel, BorderLayout.NORTH);
        add(new JScrollPane(table), BorderLayout.CENTER);
        add(button, BorderLayout.SOUTH);
    }
    private void changeStyle() {
        String selected = (String) styleBox.getSelectedItem();
        try {
            switch (selected) {
                case "Metal":
                    UIManager.setLookAndFeel("javax.swing.plaf.metal.MetalLookAndFeel");
                    break;
                case "Nimbus":
                    UIManager.setLookAndFeel("javax.swing.plaf.nimbus.NimbusLookAndFeel");
                    break;
                case "CDE/Motif":
                    UIManager.setLookAndFeel("com.sun.java.swing.plaf.motif.MotifLookAndFeel");
                    break;
            }
            SwingUtilities.updateComponentTreeUI(this);
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }
    public void exportToPDF() {
        JFileChooser chooser = new JFileChooser();
        int state = chooser.showSaveDialog(this);
        if (state == JFileChooser.APPROVE_OPTION) {
            Document document = new Document();
            try {
                PdfWriter.getInstance(document,
                        new FileOutputStream(chooser.getSelectedFile() + ".pdf"));
                document.open();
                BaseFont bf = BaseFont.createFont(
                        "C:/Windows/Fonts/arial.ttf",
                        BaseFont.IDENTITY_H,
                        BaseFont.EMBEDDED);
                Font font = new Font(bf, 12);
                String date = new SimpleDateFormat("dd.MM.yyyy HH:mm")
                        .format(new Date());
                Paragraph header = new Paragraph(
                        "Raport magazynowy\nData wygenerowania: " + date,
                        font);
                header.setAlignment(Element.ALIGN_CENTER);
                header.setSpacingAfter(20);
                document.add(header);
                PdfPTable pdfTable = new PdfPTable(table.getColumnCount());
                pdfTable.setWidthPercentage(100);
                for (int i = 0; i < table.getColumnCount(); i++) {
                    PdfPCell cell = new PdfPCell(
                            new Phrase(table.getColumnName(i), font));
                    cell.setHorizontalAlignment(Element.ALIGN_CENTER);
                    pdfTable.addCell(cell);
                }
                for (int row = 0; row < table.getRowCount(); row++) {
                    for (int col = 0; col < table.getColumnCount(); col++) {
                        PdfPCell cell = new PdfPCell(
                                new Phrase(
                                        table.getValueAt(row, col).toString(),
                                        font));
                        cell.setHorizontalAlignment(Element.ALIGN_CENTER);
                        pdfTable.addCell(cell);
                    }
                }
                document.add(pdfTable);
                JOptionPane.showMessageDialog(this,
                        "Raport wygenerowany poprawnie");
            } catch (Exception ex) {
                ex.printStackTrace();
            } finally {
                document.close();
            }
        }
    }
    public static void main(String[] args) {
        SwingUtilities.invokeLater(() ->
                new SystemRaportowania().setVisible(true));
    }
}