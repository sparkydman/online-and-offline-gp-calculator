/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Gozie
 */
import java.sql.*;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.*;


public class connectDB {
    Connection conn = null;
    
    public static Connection connDB(){
        try{
        Class.forName("com.mysql.jdbc.Driver");
    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/cgpdb","root","");
   //JOptionPane.showMessageDialog(null, "connection establisted");
     // conn.setAutoCommit(false);
        
        return conn;
    }
        catch(Exception e){
            JOptionPane.showMessageDialog(null,e);
            return null;
        }
    }
    
     public ArrayList<deptClass>getData(int value){
            ArrayList<deptClass> List = new ArrayList<>();
             conn = connDB();
            Statement st;
            ResultSet rs;
            
        try {
           
            st = conn.createStatement();
            rs = st.executeQuery("select * from departments where faculty_id = '"+ value +"'");
           
            
            deptClass s;
            while (rs.next()){
                s = new deptClass (
                            rs.getInt("faculty_id"),
                             rs.getString("dept")
                             
                             
                );
                List.add(s);
                
            }
          //  rs.close();
        //    st.close();
        } catch (SQLException ex) {
           // Logger.getLogger(connectDB.class.getName()).log(Level.SEVERE, null, ex);
          JOptionPane.showMessageDialog(null,ex);
        }
        
            
            return List;
        }
}
