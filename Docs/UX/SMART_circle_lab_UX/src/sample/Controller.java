package sample;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.stage.Stage;
import org.w3c.dom.Text;

import java.awt.TextField;
import java.awt.event.ActionEvent;
import java.io.IOException;

public class Controller {

    public void loginBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the login button");
        Parent home_page_parent = FXMLLoader.load(getClass().getResource("home_page.fxml"));
        Scene home_page_scene = new Scene(home_page_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(home_page_scene);
        app_stage.setTitle("Login");
        app_stage.show();
    }

    public void homeBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the home button");
        Parent home_page_parent = FXMLLoader.load(getClass().getResource("home_page.fxml"));
        Scene home_page_scene = new Scene(home_page_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(home_page_scene);
        app_stage.setTitle("Home Page");
        app_stage.show();
    }

    public void peopleBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the people button");
        Parent people_parent = FXMLLoader.load(getClass().getResource("people.fxml"));
        Scene people_scene = new Scene(people_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(people_scene);
        app_stage.setTitle("People");
        app_stage.show();
    }

    public void appointmentBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the appointment button");
        Parent people_parent = FXMLLoader.load(getClass().getResource("appointments.fxml"));
        Scene appointment_scene = new Scene(people_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(appointment_scene);
        app_stage.setTitle("Appointment");
        app_stage.show();
    }

    public void diagnosisBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the diagnosis button");
        Parent people_parent = FXMLLoader.load(getClass().getResource("diagnosis.fxml"));
        Scene diagnosis_scene = new Scene(people_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(diagnosis_scene);
        app_stage.setTitle("Diagnosis");
        app_stage.show();
    }

    public void prescriptionBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the prescription button");
        Parent people_parent = FXMLLoader.load(getClass().getResource("prescription.fxml"));
        Scene prescription_scene = new Scene(people_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(prescription_scene);
        app_stage.setTitle("Prescription");
        app_stage.show();
    }

    public void locationBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the location button");
        Parent location_parent = FXMLLoader.load(getClass().getResource("locations.fxml"));
        Scene location_scene = new Scene(location_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(location_scene);
        app_stage.setTitle("Locations");
        app_stage.show();
    }

    public void reportBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the report button");
        Parent people_parent = FXMLLoader.load(getClass().getResource("reports.fxml"));
        Scene report_scene = new Scene(people_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(report_scene);
        app_stage.setTitle("Reports");
        app_stage.show();
    }


    public void addPersonBtnClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the addPerson button");
        Parent people_parent = FXMLLoader.load(getClass().getResource("add_person.fxml"));
        Scene add_person_scene = new Scene(people_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(add_person_scene);
        app_stage.show();
    }

    public void signOutClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the sign out button");
        Parent login_parent = FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene login_scene = new Scene(login_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(login_scene);
        app_stage.show();
    }

    public void addPersonClick(javafx.event.ActionEvent actionEvent) throws IOException {
        System.out.println("Clicked the add person button");


        Alert alert = new Alert(Alert.AlertType.INFORMATION);
        alert.setTitle("Person Added");
        alert.setHeaderText("Person has been successfully added!");
        alert.setContentText("Name: ");

        alert.showAndWait();
        /*Parent login_parent = FXMLLoader.load(getClass().getResource("login.fxml"));
        Scene login_scene = new Scene(login_parent);
        Stage app_stage = (Stage) ((Node) actionEvent.getSource()).getScene().getWindow();
        app_stage.setScene(login_scene);
        app_stage.show();*/
    }

}
