//
//  DetailViewController.h
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-23.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import <UIKit/UIKit.h>

#import "T1Autograph.h"

enum kCriterias{
    kCOutstanding = 0,
    kCVeryGood,
    kCAcceptable,
    kCLacksConsistency,
    kCNotAcceptable,
    kCNumCriterias
};

@interface DetailViewController : UIViewController <UISplitViewControllerDelegate,UIAlertViewDelegate,UIPickerViewDelegate,UIPickerViewDataSource,T1AutographDelegate>
{
    NSManagedObject* _apprentice;
    NSManagedObject* _form;
    
    T1AutographController* autographController;
    
    NSData* _appSignatureData;
    NSData* _empSignatureData;
    NSData* _atcSignatureData;
    
    id _tempApp;
    id _tempForm;
    
    UILabel* _traineeApprenticeLabel;
    UILabel* _hostEmployerLabel;
    UILabel* _phoneNumberLabel;
    UILabel* _reportPreparedByLabel;
    UILabel* _mobileNumberLabel;
    
    UITextView* _commentHostEmployerTextField;
    UITextView* _commentApprenticeTextField;
    UITextView* _commentConsultantTextField;
    
    UIPickerView* _criteriaPickerView;
    
    UIButton* _criteraAttitudeButton;
    UIButton* _criteriaInstructionButton;
    UIButton* _criteriaSkillButton;
    UIButton* _criteriaMotivationButton;
    UIButton* _criteriaWorkmakshipButton;
    UIButton* _criteriaAppearanceButton;
    
    UIButton* currentActiveButton;
    
    UIButton* _atcSignatureButton;
    UIButton* _appSignatureButton;
    UIButton* _empSignatureButton;
    
    UIScrollView* _formScrollView;
}

- (void) setApprentice:(NSManagedObject *)aApprentice andForm:(NSManagedObject*)aForm;
- (IBAction)criteraButtonPressed:(id)sender;
- (IBAction) signatureButtonPressed:(id)sender;

@property (nonatomic, retain) NSManagedObject* apprentice;
@property (nonatomic, retain) NSManagedObject* form;

@property (retain, nonatomic) IBOutlet UILabel *detailDescriptionLabel;
@property (retain, nonatomic) IBOutlet UIScrollView *detailScrollView;

@property (retain, nonatomic) IBOutlet UILabel* traineeApprenticeLabel;
@property (retain, nonatomic) IBOutlet UILabel* hostEmployerLabel;
@property (retain, nonatomic) IBOutlet UILabel* phoneNumberLabel;
@property (retain, nonatomic) IBOutlet UILabel* reportPreparedByLabel;
@property (retain, nonatomic) IBOutlet UILabel* mobileNumberLabel;

@property (retain, nonatomic) IBOutlet UITextView *commentHostEmployerTextField;
@property (retain, nonatomic) IBOutlet UITextView *commentApprenticeTextField;
@property (retain, nonatomic) IBOutlet UITextView *commentConsultantTextField;

@property (retain, nonatomic) IBOutlet UIPickerView* criteriaPickerView;

@property (retain, nonatomic) IBOutlet UIImageView *cowerImageView;

@property (retain, nonatomic) IBOutlet UIButton *criteraAttitudeButton;
@property (retain, nonatomic) IBOutlet UIButton *criteriaInstructionButton;
@property (retain, nonatomic) IBOutlet UIButton *criteriaSkillButton;
@property (retain, nonatomic) IBOutlet UIButton *criteriaMotivationButton;
@property (retain, nonatomic) IBOutlet UIButton *criteriaWorkmakshipButton;
@property (retain, nonatomic) IBOutlet UIButton *criteriaAppearanceButton;

@property (retain, nonatomic) IBOutlet UIButton* atcSignatureButton;
@property (retain, nonatomic) IBOutlet UIButton* appSignatureButton;
@property (retain, nonatomic) IBOutlet UIButton* empSignatureButton;

@property (nonatomic, retain) IBOutlet UIScrollView* formScrollView;



@end
