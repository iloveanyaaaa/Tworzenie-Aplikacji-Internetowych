import javax.swing.*;
import java.awt.*;

public class MainWindow extends JFrame {

    public MainWindow(String login, String role) {

        setTitle("System Obsługi Sklepu");
        setSize(600,400);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(EXIT_ON_CLOSE);

        JMenuBar menuBar = new JMenuBar();

        JMenu sprzedaz = new JMenu("Sprzedaż");
        JMenu raporty = new JMenu("Raporty");
        JMenu zarzadzanie = new JMenu("Zarządzanie Użytkownikami");

        menuBar.add(sprzedaz);
        menuBar.add(raporty);
        menuBar.add(zarzadzanie);

        if(role.equals("User")){

            raporty.setEnabled(false);
            menuBar.remove(zarzadzanie);

        }

        setJMenuBar(menuBar);

        JPanel statusBar = new JPanel(new FlowLayout(FlowLayout.RIGHT));
        JLabel statusLabel = new JLabel(
                "Zalogowano jako: " + login + " | Rola: " + role
        );

        statusBar.add(statusLabel);

        add(statusBar, BorderLayout.SOUTH);

        setVisible(true);
    }
}