import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
public class LoginWindow extends JFrame {
    private JTextField loginField;
    private JPasswordField passwordField;
    public LoginWindow() {
        setTitle("Logowanie");
        setSize(400,200);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setLayout(new GridLayout(3,2,10,10));
        add(new JLabel("Login:"));
        loginField = new JTextField();
        add(loginField);
        add(new JLabel("Hasło:"));
        passwordField = new JPasswordField();
        add(passwordField);
        JButton loginButton = new JButton("Zaloguj");
        loginButton.addActionListener(this::login);
        add(new JLabel());
        add(loginButton);
        setVisible(true);
    }
    private void login(ActionEvent e) {
        String login = loginField.getText();
        String password = new String(passwordField.getPassword());
        if(login.equals("admin") && password.equals("admin123")){
            new MainWindow(login,"Admin");
            dispose();
        } else if(login.equals("user") && password.equals("user123")){
            new MainWindow(login,"User");
            dispose();
        } else {
            JOptionPane.showMessageDialog(this,
                    "Błąd loginu lub hasła",
                    "Błąd",
                    JOptionPane.ERROR_MESSAGE);
        }
    }
    public static void main(String[] args) {
        SwingUtilities.invokeLater(LoginWindow::new);
    }
}