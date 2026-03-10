import com.lowagie.text.*;
import com.lowagie.text.pdf.*;
import com.formdev.flatlaf.FlatDarkLaf;
import com.formdev.flatlaf.FlatLightLaf;
import java.awt.*;
import javax.swing.*;
import javax.swing.table.DefaultTableModel;
import java.io.FileOutputStream;
import java.text.SimpleDateFormat;
import java.util.Date;

public class SystemRaportowania extends JFrame {
    private JTable table;
    public SystemRaportowania() {
        setTitle("PSM");
        setSize(500, 500);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLocationRelativeTo(null);
        JMenuBar menuBar = new JMenuBar();
        JMenu viewMenu = new JMenu("Widok");
        JMenuItem lightMode = new JMenuItem("Light Mode");
        JMenuItem darkMode = new JMenuItem("Dark Mode");
        lightMode.addActionListener(e -> setLightMode());
        darkMode.addActionListener(e -> setDarkMode());
        viewMenu.add(lightMode);
        viewMenu.add(darkMode);
        menuBar.add(viewMenu);
        setJMenuBar(menuBar);
        DefaultTableModel model = new DefaultTableModel();
        model.addColumn("ID");
        model.addColumn("Nazwa Produktu");
        model.addColumn("Ilość");
        model.addColumn("Cena");
        model.addRow(new Object[]{1, "Buty", 670, 6700});
        model.addRow(new Object[]{2, "Koszulki", 615, 380});
        model.addRow(new Object[]{3, "Spodnie", 81, 1520});
        model.addRow(new Object[]{4, "Bluzy", 1112, 1220});
        table = new JTable(model);
        JTextField textField = new JTextField(15);
        JCheckBox checkBox = new JCheckBox("Aktywuj opcję");
        JButton button = new JButton("Generuj Raport PDF");
        button.addActionListener(e -> exportToPDF());
        JPanel topPanel = new JPanel();
        topPanel.add(new JLabel("Nazwa:"));
        topPanel.add(textField);
        topPanel.add(checkBox);
        JPanel bottomPanel = new JPanel();
        bottomPanel.add(button);
        add(topPanel, BorderLayout.NORTH);
        add(new JScrollPane(table), BorderLayout.CENTER);
        add(bottomPanel, BorderLayout.SOUTH);
    }
    private void setLightMode() {
        try {
            UIManager.setLookAndFeel(new FlatLightLaf());
            SwingUtilities.updateComponentTreeUI(this);
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }
    private void setDarkMode() {
        try {
            UIManager.setLookAndFeel(new FlatDarkLaf());
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
                String date = new SimpleDateFormat("dd.MM.yyyy HH:mm")
                        .format(new Date());
                Paragraph header = new Paragraph(
                        "Raport magazynowy\nData wygenerowania: " + date);
                header.setAlignment(Element.ALIGN_CENTER);
                header.setSpacingAfter(20);
                document.add(header);
                PdfPTable pdfTable = new PdfPTable(table.getColumnCount());
                pdfTable.setWidthPercentage(100);
                for (int i = 0; i < table.getColumnCount(); i++) {
                    PdfPCell cell = new PdfPCell(
                            new Phrase(table.getColumnName(i)));
                    cell.setHorizontalAlignment(Element.ALIGN_CENTER);
                    pdfTable.addCell(cell);
                }
                for (int row = 0; row < table.getRowCount(); row++) {
                    for (int col = 0; col < table.getColumnCount(); col++) {
                        PdfPCell cell = new PdfPCell(
                                new Phrase(
                                        table.getValueAt(row, col).toString()));
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
        try {
            UIManager.setLookAndFeel(new FlatLightLaf());
        } catch (Exception e) {
            e.printStackTrace();
        }
        SwingUtilities.invokeLater(() ->
                new SystemRaportowania().setVisible(true));
    }
}