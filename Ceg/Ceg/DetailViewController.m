//
//  DetailViewController.m
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-23.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import "DetailViewController.h"
#import "NSData+UTF8.h"


@interface DetailViewController ()
@property (strong, nonatomic) UIPopoverController *masterPopoverController;
- (void)configureView;
- (void) saveForm:(id)sender;
- (NSString*) nameForCritera:(enum kCriterias)crit;
@end

@implementation DetailViewController

@synthesize apprentice = _apprentice;
@synthesize form = _form;
@synthesize detailDescriptionLabel = _detailDescriptionLabel;
@synthesize masterPopoverController = _masterPopoverController;
@synthesize detailScrollView;

@synthesize traineeApprenticeLabel = _traineeApprenticeLabel;
@synthesize hostEmployerLabel = _hostEmployerLabel;
@synthesize phoneNumberLabel = _phoneNumberLabel;
@synthesize reportPreparedByLabel = _reportPreparedByLabel;
@synthesize mobileNumberLabel = _mobileNumberLabel;

@synthesize commentHostEmployerTextField = _commentHostEmployerTextField;
@synthesize commentApprenticeTextField = _commentApprenticeTextField;
@synthesize commentConsultantTextField = _commentConsultantTextField;

@synthesize criteriaPickerView = _criteriaPickerView;

@synthesize cowerImageView = _cowerImageView;

@synthesize criteraAttitudeButton = _criteraAttitudeButton;
@synthesize criteriaInstructionButton = _criteriaInstructionButton;
@synthesize criteriaSkillButton = _criteriaSkillButton;
@synthesize criteriaMotivationButton = _criteriaMotivationButton;
@synthesize criteriaWorkmakshipButton = _criteriaWorkmakshipButton;
@synthesize criteriaAppearanceButton = _criteriaAppearanceButton;

@synthesize atcSignatureButton = _atcSignatureButton;
@synthesize appSignatureButton = _appSignatureButton;
@synthesize empSignatureButton = _empSignatureButton;

@synthesize formScrollView = _formScrollView;

#define SAVE_ALERT_TAG 333
#define UNSAVED_ALERT_TAG 334

#pragma mark - Managing the detail item

- (void) setApprentice:(NSManagedObject *)aApprentice andForm:(NSManagedObject*)aForm
{
    /*if(_form != aForm && _apprentice != aApprentice && aApprentice && aForm)
    {
        // Unsaved changes
        UIAlertView* alert = [[UIAlertView alloc] initWithTitle:@"Unsaved changes" 
                                                        message:@"You have unsaved changes, continue without saving?" 
                                                       delegate:self 
                                              cancelButtonTitle:@"No" 
                                              otherButtonTitles:@"Yes", nil];
        alert.tag = UNSAVED_ALERT_TAG;
        [alert show];
        [alert release];
    }*/
    
    self.formScrollView.contentSize = CGSizeMake(self.view.frame.size.width, 1400);
    
    if(_form != aForm && _apprentice != aApprentice)
    {
        self.form = aForm;
        self.apprentice = aApprentice;
            
        [self configureView];
    }
    
    if (self.masterPopoverController != nil) {
        [self.masterPopoverController dismissPopoverAnimated:YES];
    }
}

- (void) cleanForm
{
    self.traineeApprenticeLabel.text = nil;
    self.hostEmployerLabel.text = nil;
    self.phoneNumberLabel.text = nil;
    self.reportPreparedByLabel.text = nil;
    self.commentHostEmployerTextField.text = nil;
    self.commentApprenticeTextField.text = nil;
    self.commentConsultantTextField.text = nil;
    
    [self.criteraAttitudeButton setTitle:[self nameForCritera:0] 
                                forState:UIControlStateNormal];
    [self.criteriaAppearanceButton setTitle:[self nameForCritera:0] 
                                   forState:UIControlStateNormal];
    [self.criteriaInstructionButton setTitle:[self nameForCritera:0] 
                                    forState:UIControlStateNormal];
    [self.criteriaMotivationButton setTitle:[self nameForCritera:0] 
                                   forState:UIControlStateNormal];
    [self.criteriaSkillButton setTitle:[self nameForCritera:0] 
                              forState:UIControlStateNormal];
    [self.criteriaWorkmakshipButton setTitle:[self nameForCritera:0]
                                    forState:UIControlStateNormal];
}

- (void)configureView
{
    // Update the user interface for the detail item.

    if (self.form && self.apprentice) {
        // Prefill 
        self.traineeApprenticeLabel.text = [NSString stringWithFormat:@"%@ %@",[self.apprentice valueForKey:@"apprentice_first_name"],[self.apprentice valueForKey:@"apprentice_surname"]];
        self.hostEmployerLabel.text = [NSString stringWithFormat:@"%@",[self.apprentice valueForKey:@"employer_name"]];
        self.phoneNumberLabel.text = [NSString stringWithFormat:@"%@",[self.apprentice valueForKey:@"apprentice_phone"]];
        self.mobileNumberLabel.text = [NSString stringWithFormat:@"%@",[self.apprentice valueForKey:@"apprentice_mobile"]];
        self.reportPreparedByLabel.text = [NSString stringWithFormat:@"%@",@""]; // TODO
        
        [self.criteraAttitudeButton setTitle:[self nameForCritera:self.criteraAttitudeButton.tag] 
                                    forState:UIControlStateNormal];
        [self.criteriaAppearanceButton setTitle:[self nameForCritera:self.criteriaAppearanceButton.tag] 
                                       forState:UIControlStateNormal];
        [self.criteriaInstructionButton setTitle:[self nameForCritera:self.criteriaInstructionButton.tag] 
                                        forState:UIControlStateNormal];
        [self.criteriaMotivationButton setTitle:[self nameForCritera:self.criteriaMotivationButton.tag] 
                                       forState:UIControlStateNormal];
        [self.criteriaSkillButton setTitle:[self nameForCritera:self.criteriaSkillButton.tag] 
                                  forState:UIControlStateNormal];
        [self.criteriaWorkmakshipButton setTitle:[self nameForCritera:self.criteriaWorkmakshipButton.tag]
                                        forState:UIControlStateNormal];
        
        UIBarButtonItem* itm = [[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemDone 
                                                                             target:self 
                                                                             action:@selector(saveForm:)];
        [self.navigationItem setRightBarButtonItem:itm 
                                          animated:YES];
        [itm release];
        
        self.cowerImageView.hidden = YES;
    }
    else
    {
        [self cleanForm];
        [self.navigationItem setRightBarButtonItem:nil 
                                          animated:YES];
        
        self.cowerImageView.hidden = NO;
    }
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Release any cached data, images, etc that aren't in use.
}

#pragma mark - View lifecycle

- (void)viewDidLoad
{
    [super viewDidLoad];
	// Do any additional setup after loading the view, typically from a nib.
    [self configureView];
}

- (void)viewDidUnload
{
    self.commentHostEmployerTextField = nil;
    self.commentApprenticeTextField = nil;
    self.commentConsultantTextField = nil;
    self.criteriaPickerView = nil;
    [self setCowerImageView:nil];
    [self setCriteraAttitudeButton:nil];
    [self setCriteriaInstructionButton:nil];
    [self setCriteriaSkillButton:nil];
    [self setCriteriaMotivationButton:nil];
    [self setCriteriaWorkmakshipButton:nil];
    [self setCriteriaAppearanceButton:nil];
    [super viewDidUnload];
    // Release any retained subviews of the main view.
    // e.g. self.myOutlet = nil;
}

- (void)viewWillAppear:(BOOL)animated
{
    [super viewWillAppear:animated];
}

- (void)viewDidAppear:(BOOL)animated
{
    [super viewDidAppear:animated];
}

- (void)viewWillDisappear:(BOOL)animated
{
	[super viewWillDisappear:animated];
}

- (void)viewDidDisappear:(BOOL)animated
{
	[super viewDidDisappear:animated];
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation
{
    // Return YES for supported orientations
    return YES;
}

#pragma mark - Split view

- (void)splitViewController:(UISplitViewController *)splitController willHideViewController:(UIViewController *)viewController withBarButtonItem:(UIBarButtonItem *)barButtonItem forPopoverController:(UIPopoverController *)popoverController
{
    barButtonItem.title = NSLocalizedString(@"Apprentices", @"Apprentices");
    [self.navigationItem setLeftBarButtonItem:barButtonItem animated:YES];
    self.masterPopoverController = popoverController;
}

- (void)splitViewController:(UISplitViewController *)splitController willShowViewController:(UIViewController *)viewController invalidatingBarButtonItem:(UIBarButtonItem *)barButtonItem
{
    // Called when the view is shown again in the split view, invalidating the button and popover controller.
    [self.navigationItem setLeftBarButtonItem:nil animated:YES];
    self.masterPopoverController = nil;
}

#pragma mark -

- (void) saveForm:(id)sender
{
    UIAlertView* alert = [[UIAlertView alloc] initWithTitle:@"Done?"
                                                    message:@"Are you done?" 
                                                   delegate:self 
                                          cancelButtonTitle:@"Return" 
                                          otherButtonTitles:@"Save and Close", nil];
    alert.tag = SAVE_ALERT_TAG;
    [alert show];
    [alert release];
}

- (void) saveFormDataToDB
{
    [self.form setValue:self.commentHostEmployerTextField.text 
                 forKey:@"host_employer_comments"];
    [self.form setValue:self.commentApprenticeTextField.text 
                 forKey:@"apprentice_comments"];
    [self.form setValue:self.commentConsultantTextField.text 
                 forKey:@"consultant_comments"];
    
    [self.form setValue:[self nameForCritera:self.criteraAttitudeButton.tag] 
                 forKey:@"work_attitude"];
    [self.form setValue:[self nameForCritera:self.criteriaInstructionButton.tag] 
                 forKey:@"accepts_instruction"];
    [self.form setValue:[self nameForCritera:self.criteriaSkillButton.tag] 
                 forKey:@"skill_level"];
    [self.form setValue:[self nameForCritera:self.criteriaMotivationButton.tag] 
                 forKey:@"motivation"];
    [self.form setValue:[self nameForCritera:self.criteriaWorkmakshipButton.tag] 
                 forKey:@"workmanship"];
    [self.form setValue:[self nameForCritera:self.criteriaAppearanceButton.tag] 
                 forKey:@"appearance"];
    
    [self.form setValue:@"" 
                 forKey:@"improvement_required_in"];
    [self.form setValue:@"" 
                 forKey:@"action_taken"];
    [self.form setValue:@"" 
                 forKey:@"warning_issued"];
    
    [self.form setValue:@"" 
                 forKey:@"profiling_book_updated"];
    [self.form setValue:@"" 
                 forKey:@"profiling_book_difficulties"];
    [self.form setValue:@"" 
                 forKey:@"profiling_book_able_to_get_signed"];
    [self.form setValue:@"" 
                 forKey:@"annual_leave_booked"];
    [self.form setValue:@"" 
                 forKey:@"rdo_booked"];
    [self.form setValue:@"" 
                 forKey:@"any_leave_required"];
    
    [self.form setValue:@"" forKey:@"changes_to"];
    
    [self.form setValue:_empSignatureData 
                 forKey:@"emp_signature"];
    [self.form setValue:_appSignatureData 
                 forKey:@"app_signature"];
    [self.form setValue:_atcSignatureData 
                 forKey:@"atc_signature"];
    
    [[self.form managedObjectContext] save:nil];
}

- (void) alertView:(UIAlertView *)alertView clickedButtonAtIndex:(NSInteger)buttonIndex
{
    if(buttonIndex != [alertView cancelButtonIndex])
    {
        if(alertView.tag == SAVE_ALERT_TAG)
        {
            [self saveFormDataToDB];
            [self setApprentice:nil 
                        andForm:nil];
        }
        else if(alertView.tag == UNSAVED_ALERT_TAG)
        {
            self.form = nil;
            self.apprentice = nil;
            [self setApprentice:_tempApp 
                        andForm:_tempForm];
        }
    }
}

#pragma mark UIPicker

- (IBAction)criteraButtonPressed:(id)sender 
{
    currentActiveButton = sender;
    /*[self.criteriaPickerView selectRow:currentActiveButton.tag 
                           inComponent:1 
                              animated:NO];*/
    [UIView animateWithDuration:0.2f 
                     animations:^(void){
                         self.criteriaPickerView.frame = CGRectMake(0, 
                                                                    (self.view.frame.size.height - self.criteriaPickerView.frame.size.height), 
                                                                    self.criteriaPickerView.frame.size.width, 
                                                                    self.criteriaPickerView.frame.size.height);
                     }];
}

- (void) pickerView:(UIPickerView *)pickerView didSelectRow:(NSInteger)row inComponent:(NSInteger)component
{
    [currentActiveButton setTag:row];
    [currentActiveButton setTitle:[self nameForCritera:row] 
                         forState:UIControlStateNormal];
    currentActiveButton = nil;
    
    [UIView animateWithDuration:0.2f 
                     animations:^(void){
                         self.criteriaPickerView.frame = CGRectMake(0, 
                                                                    self.view.frame.size.height, 
                                                                    self.criteriaPickerView.frame.size.width, 
                                                                    self.criteriaPickerView.frame.size.height);
                     }];
}

- (NSInteger) pickerView:(UIPickerView *)pickerView numberOfRowsInComponent:(NSInteger)component
{
    return kCNumCriterias;
}

- (NSInteger) numberOfComponentsInPickerView:(UIPickerView *)pickerView
{
    return 1;
}

- (NSString*) pickerView:(UIPickerView *)pickerView titleForRow:(NSInteger)row forComponent:(NSInteger)component
{
    return [self nameForCritera:row];
}

- (NSString*) nameForCritera:(enum kCriterias)crit
{
    NSString* criteria = nil;
    
    switch (crit) {
        case kCOutstanding:
            criteria = @"Outstanding";
            break;
        case kCVeryGood:
            criteria = @"Very good";
            break;
        case kCAcceptable:
            criteria = @"Acceptable";
            break;
        case kCLacksConsistency:
            criteria = @"Lacks consistency";
            break;
        case kCNotAcceptable:
            criteria = @"Not acceptable";
            break;
        default:
            break;
    }
    
    return criteria;
}

#pragma mark -

- (IBAction) signatureButtonPressed:(id)sender
{
    currentActiveButton = sender;
    autographController = [[T1Autograph autographWithDelegate:self 
                                           modalDisplayString:nil] retain];
}

- (void) autographDidCompleteWithImageData:(NSData *)imageData hashValue:(NSString *)hashValue
{
    if(currentActiveButton == self.atcSignatureButton)
    {
        [_atcSignatureData release];
        _atcSignatureData = [imageData retain];
    }
    if(currentActiveButton == self.appSignatureButton)
    {
        [_appSignatureData release];
        _appSignatureData = [imageData retain];
    }
    if(currentActiveButton == self.empSignatureButton)
    {
        [_empSignatureData release];
        _empSignatureData = [imageData retain];
    }
    
    UIImage* img = [UIImage imageWithData:imageData];
    
    //CGSize size = [img size];

    
    [currentActiveButton setBackgroundImage:img
                                   forState:UIControlStateNormal];
    
    currentActiveButton = nil;
}

- (void) autographDidCompleteWithNoData
{
    currentActiveButton = nil;
}

- (void) dealloc
{
    self.form = nil;
    self.apprentice = nil;
    self.detailDescriptionLabel = nil;
    
    self.commentHostEmployerTextField = nil;
    self.commentApprenticeTextField = nil;
    self.commentConsultantTextField = nil;
    self.criteriaPickerView = nil;
    [_cowerImageView release];
    [_criteraAttitudeButton release];
    [_criteriaInstructionButton release];
    [_criteriaSkillButton release];
    [_criteriaMotivationButton release];
    [_criteriaWorkmakshipButton release];
    [_criteriaAppearanceButton release];
    [super dealloc];
}


@end
