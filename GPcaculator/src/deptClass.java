
public class deptClass {
    private int fac_id;
    private String faculty_name;
    
    public deptClass(){}
    
    public deptClass(
     int Fac_id,
     String Faculty
    ){
    
     this.fac_id=Fac_id;
     this.faculty_name=Faculty;
     
    }

    public int getFac_id() {
        return fac_id;
    }

    public void setFac_id(int fac_id) {
        this.fac_id = fac_id;
    }

    public String getFaculty_name() {
        return faculty_name;
    }

    public void setFaculty_name(String faculty_name) {
        this.faculty_name = faculty_name;
    }

    
    
}

