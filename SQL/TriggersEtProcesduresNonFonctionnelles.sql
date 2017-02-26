DELIMITER //
DROP TRIGGER IF EXISTS t_insert_compte_benevole//
DROP PROCEDURE IF EXISTS searchPatternIntoInfoCompl//

CREATE TRIGGER t_insert_compte_benevole
  AFTER INSERT ON Compte FOR EACH ROW
  BEGIN
    DECLARE para VARCHAR(35);
    if ((SELECT count(*) FROM Benevole)>0) THEN
    call searchPatternIntoInfoCompl('<mail>',@para);
    IF (@para<>NULL) THEN
      UPDATE Benevole set idCompte=NEW.idCompte where idBenevole=@para;
    END IF;
      END IF;
  END//

CREATE PROCEDURE searchPatternIntoInfoCompl(IN chaine VARCHAR(10), OUT result INT)
  BEGIN
    DECLARE idBene INT;
    DECLARE infoC VARCHAR(500);
    DECLARE cur CURSOR FOR SELECT idBenevole,infoCompl FROM Benevole;
    set result=NULL;
    OPEN cur;
    read_loop :LOOP
      FETCH cur INTO idBene,infoC;
      IF (locate(chaine,@infoC)!=0) THEN
        set result=@idBene;
        LEAVE read_loop;
      END IF;
    END LOOP;
    CLOSE cur;
END; //
